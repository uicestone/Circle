(function($) {
  var exports = {
    apiBase: "",
    login: function(callback){
      var loginModal = $("#modal-login");


      loading.show();
      $.getJSON(apiBase + "/wx/qrcode/?action=login&t=" + (+new Date()),function(data){
        loginModal.modal('show');
        if(data.errcode){
          alert(data.errmsg);
          loginModal.modal('hide');
          return;
        }
        var url = data.url;
        loginModal.find("#login-qr").attr("src", url).show();
        pollingLogin.start(function(){
          if(callback){
            $("#login").hide();
            $("#welcome").show().html("你好, " + userProfile.nickname);
            loading.hide();
            loginModal.modal('hide');
            callback();
          }else{
            location.reload();
          }
        },data.action_info.scene.scene_id);
        loading.hide();
      },function(){
        loginModal.modal('hide');
      });


    },
    assureLogin: function(callback){
      judgeLogin(callback,function(){
        login(callback);
      });
    },
    loading: {
      init: function() {
        var loading_container = $("<div id='loading' />");
        var loading_bg = $("<div class='loading-bg' />");
        loading_container.appendTo($('body'));
        loading_bg.appendTo(loading_container);
        new Spinner({
          color: "#fff",
        }).spin(loading_bg[0]);
        loading.hide();
      },
      show: function() {
        $("#loading").show();
      },
      hide: function() {
        $("#loading").hide();
      }
    },
    pollingLogin: (function() {
      var keepGoing = false;

      function polling(callback,scene_id) {
        var interval = 750;
        judgeLogin(function() {
          callback();
        }, function() {
          keepGoing && setTimeout(function() {
            polling(callback,scene_id);
          }, interval);
        },scene_id);
      }

      return {
        start: function(callback, scene_id) {
          keepGoing = true;
          polling(callback,scene_id);
        },
        stop: function() {
          keepGoing = false;
        }
      }

    })(),
    assureProfile: function(callback){
      if(JSON.stringify(userProfile) !== "{}"){
        var needComplete = false;
        for(var key in userProfile){
          if(!userProfile[key]){
            needComplete = true
          }
        }
        if(needComplete){
          updateProfile(callback);
        }else{
          callback(userProfile);
        }
      }else{
        login(function(){
          assureProfile(callback);
        });
      }
    },
    fillMine: function(){
      // fill form with window data
      $("#profile .field .form-control").each(function(i,el){
        el = $(el);
        var name = el.attr("name");
        userProfile && userProfile[name] && el.val(userProfile[name]);
      });

      // load orders
      loading.show();
      $.getJSON("/order/?t=" + (+ new Date()), function(data){
        var html = render($("#modal-mine-tr").html(),{items:data});
        $("#order-tbody").html(html);
        loading.hide();
      });
    },
    updateProfile: function(callback){
      window.profileUpdatedCallback = callback;
      var modal = $("#modal-mine");

      modal.modal();
      modal.find(".menu .active").removeClass("active");
      modal.find(".menu li:eq(2) a").trigger("click");
    },
    showMyOrders: function(){
      var modal = $("#modal-mine");
      modal.modal();
      modal.find(".menu .active").removeClass("active");
      modal.find(".menu li:eq(1) a").trigger("click");
    },
    judgeLogin: function(succ, fail, scene_id) {
      var self = this;
      var url = apiBase + "/user-profile/";
      url += "?t=" + (+new Date());
      if(scene_id){
        url += "&scene_id="+scene_id;
      }
      $.getJSON( url, function(data) {
        var keys = [];
        for(var item in data){
          keys.push(item);
        }
        if (keys.length) {
          window.userProfile = data;
          return succ();
        } else {
          fail();
        }
      }).fail(fail);
    },
    // Simple JavaScript Templating
    // John Resig - http://ejohn.org/ - MIT Licensed
    render: (function() {
      var cache = {};

      return function tmpl(str, data) {
        // Figure out if we're getting a template, or if we need to
        // load the template - and be sure to cache the result.
        var fn = !/\W/.test(str) ?
          cache[str] = cache[str] ||
          tmpl(document.getElementById(str).innerHTML) :

          // Generate a reusable function that will serve as a template
          // generator (and which will be cached).
          new Function("obj",
            "var p=[],print=function(){p.push.apply(p,arguments);};" +

            // Introduce the data as local variables using with(){}
            "with(obj){p.push('" +

            // Convert the template into pure JavaScript
            str
            .replace(/[\r\t\n]/g, " ")
            .split("<%").join("\t")
            .replace(/((^|%>)[^\t]*)'/g, "$1\r")
            .replace(/\t=(.*?)%>/g, "',$1,'")
            .split("\t").join("');")
            .split("%>").join("p.push('")
            .split("\r").join("\\'") + "');}return p.join('');");

        // Provide some basic currying to the user
        return data ? fn(data) : fn;
      };
    })()
  }
  $(function() {
    window.loading.init();
    $("#modal-login").on('hide.bs.modal',function(){
      loading.hide();
      pollingLogin.stop();
    });

    $("#login").click(function(e){
      e.preventDefault();
      login();
    });

    $("#modal-mine").on('show.bs.modal',function(){
      fillMine();
    }).on('hide.bs.modal',function(){
      window.profileUpdatedCallback = null;
    });

    $('[title="订单服务"]').click(function(){
      assureLogin(showMyOrders);
      return false;
    });
    // 弹层tab切换
    var menus = $(".modal-body .menu li");
    menus.click(function(e) {
        e.preventDefault();
        menus.removeClass("active");
        $(this).addClass("active");
        $('.tabbody').hide();
        $($(this).find('a').attr('target')).show();
    });

    // 订单详情
    $("#order .btn").live('click',function() {
        $(".tabbody").hide();
        $("#order-detail").show();
        var data = $.parseJSON(unescape($(this).closest('tr').attr('data-item')));

        var data_field_mapping = {
          order_date:"date",
          order_id:"id",
          user_nickname:"receiver",
          user_mobile:"contact",
          product_name:"product_meta.name",
          product_id:"product_meta.id",
          product_size:"product_meta.size",
          product_amount:"product_meta.amount",
          product_price:"product_meta.price",
          summary_price:"product_meta.price * product_meta.amount"
        };


        function toValue(statement){
          return new Function("data","with(data){return " + statement + "}")(data);
        }

        for(field in data_field_mapping){
          var value = toValue(data_field_mapping[field]);
          $("#order-detail").find("." + field).html(value);
        }
    });

    // 个人资料
    // 表单验证
    function validateField(input){
      var validators = {
        "zipcode":function(v){
          return v.match(/^\d{6}$/);
        },
        "contact":function(v){
          return v.match(/^\d+$/);
        }
      };
      var fieldName = input.attr("id").split("-")[1];
      var value = input.val().trim();
      var hint = input.parent().find(".hint");
      if(value){
        if(passValidator(value)){
          hint.html('<i class="icon-ok"></i>');
          return true;
        }else{
          hint.html('<i class="icon-warn"></i>格式不正确');
          return false;
        }
      }else{
        hint.html('<i class="icon-warn"></i>此项为必填');
        return false;
      }
      function passValidator(v){
        var validator = validators[fieldName];
        if(!validator){return true}
        else{
          return validator(v)
        }
      }
    }

    function getProfileData(){
      var data = {};
      $("#profile .field .form-control").each(function(i,el){
        el = $(el);
        data[el.attr('name')] = el.val();
      });
      return data;
    }
    $("#profile .field .form-control").blur(function(){
      var input = $(this);
      validateField(input);
    });
    $("#profile .btn-update").click(function() {
        // check form
        var ok = true;
        $("#profile .field .form-control").each(function(i,el){
          var fieldOk = validateField($(el));
          if(!fieldOk){ok = false;}
        });
        if(ok){
          loading.show();
          $.post("/user-profile",getProfileData(),function(profile){
            window.userProfile = profile;
            loading.hide();

            if(window.profileUpdatedCallback){
              profileUpdatedCallback(userProfile);
              $("#modal-mine").modal('hide');
            }else{
              $(".tabbody").hide();
              $("#profile-updated").show();
            }
          });
        }
    });
    $("#profile-updated .btn-check").click(function() {
      $(".tabbody").hide();
      $("#profile").show();
    });

  });
  $.extend(window, exports);


})(jQuery);
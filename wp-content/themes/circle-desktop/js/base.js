(function($) {
  var exports = {
    apiBase: siteUrl,
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
    showMyOrders: function(){
      loading.show();
      var modal = $("#modal-mine");
      modal.modal();
      modal.find(".menu .active").removeClass("active");
      modal.find(".menu li:eq(1) a").trigger("click");
      $.getJSON(/order/, function(data){
        var html = render($("#modal-mine-tr").html(),{items:data});
        $("#order-tbody").html(html);
        loading.hide();
      });
    },
    judgeLogin: function(succ, fail, scene_id) {
      var self = this;
      var url = apiBase + "/user-profile/";
      if(scene_id){
        url += "?scene_id="+scene_id;
      }
      $.getJSON( url, function(data) {
        var keys = [];
        for(var item in data){
          keys.push(item);
        }
        if (keys.length) {
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
  });
  $.extend(window, exports);
})(jQuery);
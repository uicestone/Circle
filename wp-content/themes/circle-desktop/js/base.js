(function($) {
  var exports = {
    apiBase: "http://circlewava.apiary-mock.com",
    loading: {
      init: function() {
        $("<div id='loading' />").appendTo($('body'));
        new Spinner({
          color: "#fff",
        }).spin(document.getElementById('loading'));
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

      function polling(callback) {
        var interval = 750;
        judgeLogin(function() {
          callback();
        }, function() {
          keepGoing && setTimeout(function() {
            polling(callback);
          }, interval);
        });
      }

      return {
        start: function(callback) {
          keepGoing = true;
          polling(callback);
        },
        stop: function() {
          keepGoing = false;
        }
      }

    })(),

    judgeLogin: function(succ, fail) {
      var self = this;
      $.getJSON( apiBase + "/user-profile/", function(data) {
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
(function($) {
	window.pollingLogin = (function() {
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

	})();

	window.judgeLogin = function(succ, fail) {
		$.getJSON("/login-polling", function(data) {
			if (data.logged_in) {
				return succ();
			} else {
				fail();
			}
		}).fail(fail);
	}


})(jQuery);
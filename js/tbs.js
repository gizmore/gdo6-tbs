"use strict";

window.TBS = {
	heartbeat: function() {
		let url = GWF_WEB_ROOT + 'index.php?mo=TBS&me=Heartbeat';
		$.get(url).then(function(result) {
			
			$('#left-unread-pm').
			text(result.data.unread_pm).
			css('display', result.data.unread_pm > 0 ? 'block' : 'none');

			$('#left-unread-forum').
			text(result.data.unread_forum).
			css('display', result.data.unread_forum > 0 ? 'block' : 'none');
			
			let online = $('#tbs-online-list');
			let list = result.data.online_users;
			for (var i in list) {
				let user = new GDO_User(list[i]);
				let profileLink = user.profileLink();
				online.addChild($('<div>' + profileLink + '<span>'+user.level()+'</span></div>'));
			}
		});
	}
};

setInterval(window.TBS.heartbeat, 30000);

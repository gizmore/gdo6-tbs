"use strict";
window.TBS = {
		
	heartbeat: function() {
		
		let url = GDO_WEB_ROOT + 'index.php?mo=TBS&me=Heartbeat&_ajax=1&_fmt=json';
		
		$.get(url).then(function(result) {
			
			let url1 = window.GDO.href('PM', 'Overview');
			let unreadAnchor1 = $('<a href="'+url1+'">'+result.json.unread_pm+'</a>');
			$('#left-unread-pm').
			html(unreadAnchor1).
			css('display', result.json.unread_pm > 0 ? 'block' : 'none');

			let url2 = window.GDO.href('Forum', 'Unread');
			let unreadAnchor2 = $('<a href="'+url2+'">'+result.json.unread_forum+'</a>');
			$('#left-unread-forum').
			html(unreadAnchor2).
			css('display', result.json.unread_forum > 0 ? 'block' : 'none');
			
			let online = $('#tbs-online-list');
			let list = result.json.online_users;
			for (var i in list) {
				let user = new GDO_User(list[i]);
				let profileLink = user.profileLink();
				online.addChild($('<div>' + profileLink + '<span>'+user.level()+'</span></div>'));
			}
		});
	}
};

setInterval(window.TBS.heartbeat, 30000);

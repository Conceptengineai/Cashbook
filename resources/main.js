$("#loginForm").submit (function(event) {

	// submit をキャンセル
	event.preventDefault () ;

	// Ajax 処理
	$.ajax ( {
		url: 'http://localhost/cashbook/login.php', 
		type: 'POST', 
		dataType: 'json', 
		data: {user_name: $('#user_name_text').val(), 
			user_pw: $('#user_pw_text').val() },
		timeout: 10000, 
		success: function () {
			alert ("OK") ;
		}, 
		error: function () {
			alert ("NG") ; 
		}
	}) ;
}) ;

function logout() {

	var ans = confirm ('ログアウトしますか？') ;
	if (ans == true) {
		$.get ('http://localhost/cashbook/session_destroy.php', function (data) {
			alert ('a:' + data) ;
		}) ;
	}
}

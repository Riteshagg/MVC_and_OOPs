var site = 'http://localhost/learnPHP/self/frontend/views/';

function logout() {
    $.ajax({
        url: site+'auth/logout.php?action=logout',
        type: 'get',
        data:{action:'logout'},
        success: function(data){
            window.location=site+'auth/login.php';
        }
    });
}

jQuery(function($){

    // HTML приложения
    var app_html=`
        <div class='container'>

            <div class="stats">
                <div class="rectangle_8">
                    <span class="AppCo">Bitmedia</span>
                </div>
            </div>

            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="#">Main page</a></li>
                    <li> > </li>
                    <li class="active">Users</li>
                </ul>
            </div>
            <!-- здесь будет показано содержимое -->
            <div id='page-content'></div>
            <div id='page-stat'></div>
            
            <div class="footer">
                <div class="rectangle_31">
                    <span class="appco_footer">AppCo</span>
                    <span >All rights reserved by ThemeTags</span>
                    <span>Copyrights © 2019. </span>
                </div>
            </div>
        </div>`;

    // вставка кода на страницу
    $("#app").html(app_html);

});

// изменение заголовка страницы
function changePageTitle(page_title){

    // измение заголовка страницы
    $('#page-title').text(page_title);

    // измение заголовка вкладки браузера
    document.title=page_title;
}

// функция для создания значений формы в формате json
$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
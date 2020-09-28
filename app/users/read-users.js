jQuery(function($){

    // показать список товаров при первой загрузке
    showUsersFirstPage();

    // когда была нажата кнопка «страница»
    $(document).on('click', '.pagination li', function(){
        // получаем json url
        var json_url = $(this).find('a').attr('data-page');

        // покажем список товаров
        showUsers(json_url);
    });
});

    function showUsersFirstPage(){
        var json_url="http://bitmedia/user/read_paging.php";
        showUsers(json_url);
    }

    function showUsers(json_url){

        console.log(json_url);
        // получить список товаров из API
        $.ajax({
            url: json_url,
            method: 'GET',
            success: function (response) {
                var read_users_html=`
                    <div class="users_stat">
                        <span class="users_stat">Users statistics</span>
                    </div>
    
                <div class="table">
                    <table class="rectangle_9">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Ip adress</th>
                        </tr>
                        </thead>`;

                // перебор списка возвращаемых данных
                $.each(response.records, function(key, val) {

                    // создание новой строки таблицы для каждой записи
                    read_users_html+=`
                        <tbody>
                        <tr class="read_one_user" data-id='` + val.id + `' data-user='` + val.first_name + ' ' + val.last_name + `'>
                            <td>` + val.id + `</td>
                            <td>` + val.first_name + `</td>
                            <td>` + val.last_name + `</td>
                            <td>` + val.email + `</td>
                            <td>` + val.gender + `</td>
                            <td>` + val.ip_adress + `</td>
                        </tr>
                        </tbody>`;
                });
                // конец таблицы
                read_users_html+=`
                    </table> 
`;
                // pagination
                if (response.paging) {
                    read_users_html+="<ul class='pagination pull-left margin-zero padding-bottom-2em'>";

                    // первая
                    if(response.paging.first!=""){
                        read_users_html+="<li><a data-page='" + response.paging.first + "'>Первая страница</a></li>";
                    }

                    // перебор страниц
                    $.each(response.paging.pages, function(key, val){
                        var active_page=val.current_page=="yes" ? "class='active'" : "";
                        read_users_html+="<li " + active_page + "><a data-page='" + val.url + "'>" + val.page + "</a></li>";
                    });

                    // последняя
                    if (response.paging.last!="") {
                        read_users_html+="<li><a data-page='" + response.paging.last + "'>Последняя страница</a></li>";
                    }
                    read_users_html+="</ul>";
                }

                // вставка в 'page-content' нашего приложения
                $("#page-content").html(read_users_html);

                // изменяем заголовок страницы
                changePageTitle("Пользователи");
            }
        });

    }


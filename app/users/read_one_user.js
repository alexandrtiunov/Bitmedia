jQuery(function($){

    // обрабатываем нажатие кнопки «Просмотр товара»
    $(document).on('click', '.read_one_user', function(){

        // get product id
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-user');
        var url = "http://bitmedia/user/read_one.php?user/id=" + id;

        // отправляем аяксом на полученную ссылку
        $.ajax({
            url: url,
            method: 'GET',
            success: function (response) {
                history.pushState('data to be passed', 'Title of the page', "/user/id=" + id);

                var chart1;
                var date = [];
                var page_views = [];
                var clicks = [];

                // console.log(response.records);
                $.each(response.records, function(key, val) {

                    date.push(val.date);
                    page_views.push(parseInt(val.page_views));
                    clicks.push(parseInt(val.clicks));
                });

                chart1 = new Highcharts.Chart({

                    chart: {
                        renderTo: 'page-stat',
                        width: 1140,
                        marginBottom: 65,
                        type: 'line'},

                    title: {
                        text: name
                    },
                    xAxis: {
                        categories: date
                    },
                        yAxis: {
                            title: {
                                text: 'Page views & Clicks'
                            }
                        },
                        plotOptions: {
                            line: {
                                dataLabels: {
                                    enabled: true
                                },
                                enableMouseTracking: false
                            }
                        },
                    series: [{
                        name: 'Page Views',
                        data: page_views
                    },
                        {
                            name: 'Clicks',
                            data: clicks
                        }],

                    tooltip: {
                        headerFormat: '<b>{series.name}</b><br />',
                        pointFormat: 'x = {point.x}, y = {point.y}'
                    }
                });

                var read_users_html=`
                    <div class="stats">
                    <div class="rectangle_8">
                        <span class="AppCo">Bitmedia</span>
                    </div>
                </div>
        
                <div class="breadcrumbs">
                    <ul class="breadcrumb">
                        <li><a href="#">Main page</a></li>
                        <li> > </li>
                        <li><a href="http://bitmedia/app/users.php">User statistic</a></li>
                        <li> > </li>
                        <li class="active">'` + name + `'</li>
                    </ul>
                </div>
        
                <div class="clicks">
                    <span>Page Views & Clicks</span>
                </div>
        
                <div class="footer">
                    <div class="rectangle_31">
                        <span class="appco_footer">AppCo</span>
                        <span >All rights reserved by ThemeTags</span>
                        <span>Copyrights © 2019. </span>
                    </div>
                </div>`;

                // вставка в 'page-content' нашего приложения
                $("#page-content").html(read_users_html);

                // изменяем заголовок страницы
                changePageTitle("Статистика " + name);
            }
        });
    });
    window.history.pushState('', null, './users.php');
    $(window).on('popstate', function() {
        location.reload(true);
    });
});
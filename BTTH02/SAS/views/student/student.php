<?php
include_once '../models/sql_connect.php';
class AttendaceController{
    public function doAttendance($id_Class,$id_Student,$status){
        $pdo = new Database();
        $conn = $pdo->getConnection();
        $attendace_Date = date('Y-m-d');
        $sql = ("INSERT INTO attendace ($attendace_Date,$id_Class,$id_Student,$status) VALUES (':attendace_Date,:id_Class,:id_Student,:status')");
        $stmt = $conn->prepare($sql);
        $stmt->execute([$attendace_Date,$id_Class,$id_Student,$status]);
    }
}
?>      
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!------ Include the above in your HEAD tag ---------->
    <title>Document</title>
    <style>
        body {
            padding: 20px 0px 200px;
        }
        h1.title {
            font-family: 'Roboto', sans-serif;
            font-weight: 900;
        }
        .calendar {
            margin: 0px 40px;
        }
        .popover.calendar-event-popover {
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            color: rgb(120, 120, 120);
            border-radius: 2px;
            max-width: 300px;
        }
        .popover.calendar-event-popover h4 {
            font-size: 14px;
            font-weight: 900;
        }
        .popover.calendar-event-popover .location,
        .popover.calendar-event-popover .datetime {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        .popover.calendar-event-popover .location > span,
        .popover.calendar-event-popover .datetime > span {
            margin-right: 10px;
        }
        .popover.calendar-event-popover .space,
        .popover.calendar-event-popover .attending {
            margin-top: 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid rgb(160, 160, 160);
            font-weight: 700;
        }
        .popover.calendar-event-popover .space > .pull-right,
        .popover.calendar-event-popover .attending > .pull-right {
            font-weight: 400;
        }
        .popover.calendar-event-popover .attending {
            margin-top: 5px;
            font-size: 18px;
            padding: 0px 10px 5px;
        }
        .popover.calendar-event-popover .attending img {
            border-radius: 50%;
            width: 40px;
        }
        .popover.calendar-event-popover .attending span.attending-overflow {
            display: inline-block;
            width: 40px;
            background-color: rgb(200, 200, 200);
            border-radius: 50%;
            padding: 8px 0px 7px;
            text-align: center;
        }
        .popover.calendar-event-popover .attending > .pull-right {
            font-size: 28px;
        }
        .popover.calendar-event-popover a.btn {
            margin-top: 10px;
            width: 100%;
            border-radius: 3px;
        }
        [data-toggle="calendar"] > .row > .calendar-day {
            font-family: 'Roboto', sans-serif;
            width: 14.28571428571429%;
            border: 1px solid rgb(235, 235, 235);
            border-right-width: 0px;
            border-bottom-width: 0px;
            min-height: 120px;
        }
        [data-toggle="calendar"] > .row > .calendar-day.calendar-no-current-month {
            color: rgb(200, 200, 200);
        }
        [data-toggle="calendar"] > .row > .calendar-day:last-child {
            border-right-width: 1px;
        }

        [data-toggle="calendar"] > .row:last-child > .calendar-day {
            border-bottom-width: 1px;
        }

        .calendar-day > time {
            position: absolute;
            display: block;
            bottom: 0px;
            left: 0px;
            font-size: 12px;
            font-weight: 300;
            width: 100%;
            padding: 10px 10px 3px 0px;
            text-align: right;
        }
        .calendar-day > .events {
            cursor: pointer;
        }
        .calendar-day > .events > .event h4 {
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 3px;
        }
        .calendar-day > .events > .event > .desc,
        .calendar-day > .events > .event > .location,
        .calendar-day > .events > .event > .datetime,
        .calendar-day > .events > .event > .attending {
            display: none;
        }
        .calendar-day > .events > .event > .progress {
            height: 10px;
        }


         .overlay {
             position: fixed;
             top: 0;
             left: 0;
             width: 100%;
             height: 100%;
             background-color: rgba(0, 0, 0, 0.5); /* Màu nền mờ */
             /*display: none; !* Ban đầu ẩn *!*/
         }

        .overlay-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 12 4px;
            width: 500px;
            height: 300px;
        }


    </style>
</head>
<body>

<h1 class="title text-center"> July 2014 </h1>
<div class="calendar" data-toggle="calendar">
    <div class="row">
        <div class="col-xs-12 calendar-day calendar-no-current-month">
            <time datetime="2014-06-29">29</time>
        </div>
        <div class="col-xs-12 calendar-day calendar-no-current-month">
            <time datetime="2014-06-30">30</time>
        </div>
        <div class="col-xs-12 calendar-day">
           <time datetime="2014-07-01"><a href="">01</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-02"><a href="">02</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-03"><a href="">03</a></time>
            <div class="events">
                <div class="event">
                    <h4>Mid Day Dance Break - SELF CARE</h4>
                    <div class="desc">
                        <p>Take a Break and enjoy Live dance and Art from Eries own local Talent</p>
                        <p>Support for this program is provided in part from an Erie Arts & Culture Project Grant, made possible by community contributions to the Combined Arts & Cultural Campaign and the Erie Arts Endowment.</p>
                    </div>
                    <div class="location"> <span class="glyphicon glyphicon-map-marker"></span> State St and Rt 5, Erie, Pa.</div>
                    <div class="datetime"> <span class="glyphicon glyphicon-time"></span> 12:00am - 1:00pm</div>
                    <div class="attending">
                        <img src="http://api.randomuser.me/portraits/women/54.jpg" />
                        <img src="http://api.randomuser.me/portraits/men/27.jpg" />
                        <img src="http://api.randomuser.me/portraits/men/61.jpg" />
                    </div>


                </div>
            </div>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-04"><a href="">04</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-05"><a href="">05</a></time>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-06"><a href="">06</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-07"><a href="">07</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-08"><a href="">08</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-09"><a href="">09</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-10"><a href="">10</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-11"><a href="">11</a></time>
            <div class="events">
                <div class="event">
                    <h4>Local artist showing, meet and greet and feature film</h4>
                    <div class="desc">
                        <p>We will be showing local artists films on our new 16 foot movie screen with feature film last "Carnival Of Souls", come see the new BT, hang out and socialize while enjoying some local talent. FREE event, suggested $2 or $3 donation. Concessions, popcorn, soda etc available so come hungry!!</p>
                        <p>*This event is all ages welcomed and also handicapped accessible (side entrance ramp)</p>
                        <p>Featuring :</p>
                        <ul>
                            <li><a href="https://www.youtube.com/user/walrys11/videos">Jack Rys</a></li>
                            <li><a href="http://society6.com/wombglow">Alex Wilson</a></li>
                            <li><a href="http://www.erieartcompany.com/">Brad Ford</a></li>
                            <li><a href="http://www.youtube.com/watch?v=dkTz0EvfEiY">Carnival of Souls</a> (Trailer)</li>
                        </ul>
                    </div>
                    <div class="location"> <span class="glyphicon glyphicon-map-marker"></span> 145 West 11th Street, Erie, Pa.</div>
                    <div class="datetime"> <span class="glyphicon glyphicon-time"></span> 7:00pm - ?</div>
                    <div class="attending">
                        <img src="http://api.randomuser.me/portraits/women/31.jpg" />
                        <img src="http://api.randomuser.me/portraits/women/47.jpg" />
                        <img src="http://api.randomuser.me/portraits/women/93.jpg" />
                    </div>


                </div>
            </div>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-12"><a href="">12</a></time>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-13"><a href="">13</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-14"><a href="">14</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-15"><a href="">15</a></time>
            <div class="events">
                <div class="event">
                    <h4>Erie Art Museum 91st Annual Spring Show</h4>
                    <div class="desc">
                        <p>This juried, regional multi-media exhibition, open to all artists living within a 250-mile radius of Erie represents all media and showcases the most current and finest artwork created in the area.</p>
                    </div>
                    <div class="location"> <span class="glyphicon glyphicon-map-marker"></span> Presque Isle State Park </div>
                    <div class="datetime"> <span class="glyphicon glyphicon-time"></span> ALL DAY</div>
                    <div class="attending">
                        <img src="http://api.randomuser.me/portraits/men/10.jpg" />
                        <img src="http://api.randomuser.me/portraits/men/23.jpg" />
                        <img src="http://api.randomuser.me/portraits/men/66.jpg" />
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-16"><a href="">16</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-17"><a href="">17</a></time>>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-18"><a href="">18</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-19"><a href="">19</a></time>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-20"><a href="">20</a></time>
            <div class="events">
                <div class="event">
                    <h4>Mouse0270's 24th Birthday</h4>
                    <div class="desc">
                        <p style="text-align:center;">Friendships are one of the few things that improve with age<br/>
                            The family and friends of <br/>
                            Mouse0270 <br/>
                            invite you to celebrate his <br/>
                            24th Birthday and a lifetime of good friendship</p>
                    </div>
                    <div class="location"> <span class="glyphicon glyphicon-map-marker"></span> Erie, Pa </div>
                    <div class="datetime"> <span class="glyphicon glyphicon-time"></span> 10:00pm - 2:00am </div>
                    <div class="attending">
                        <img src="https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-xfa1/t1.0-9/417157_4897339837183_626079670_n.jpg" />
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-21"><a href="">21</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-22"><a href="">22</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-23"><a href="">23</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-24"><a href="">24</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-25"><a href="">25</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-26"><a href="">26</a></time>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-27"><a href="">27</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-28"><a href="">28</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-29"><a href="">29</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-30"><a href="">30</a></time>
        </div>
        <div class="col-xs-12 calendar-day">
            <time datetime="2014-07-31"><a href="">31</a></time>
        </div>
        <div class="col-xs-12 calendar-day calendar-no-current-month">
            <time datetime="2014-08-01"><a href="">01</a></time>
        </div>
        <div class="col-xs-12 calendar-day calendar-no-current-month">
            <time datetime="2014-08-02"><a href="">02</a></time>
        </div>
    </div>
</div>
<div class="overlay" id="overlay">
    <div class="overlay-content">
        <h2>Điểm Danh</h2>
        <p>Điểm danh ở đây </p>
        <form action="attendaceController.php" method="POST">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">Có mặt</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">Muộn</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="option3">
                <label class="form-check-label" for="inlineRadio3">Vắng mặt</label>
            </div>
            <button type = "submit" id="hide-overlay">Gửi</button>
        </form>
        <br>

    </div>
</div>

</body>
<script>
    $(function () {
        $('[data-toggle="calendar"] > .row > .calendar-day > .events > .event').popover({
            container: 'body',
            content: 'Hello World',
            html: true,
            placement: 'bottom',
            template: '<div class="popover calendar-event-popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
        });

        $('[data-toggle="calendar"] > .row > .calendar-day > .events > .event').on('show.bs.popover', function () {
            var attending = parseInt($(this).find('div.progress>.progress-bar').attr('aria-valuenow')),
                total = parseInt($(this).find('div.progress>.progress-bar').attr('aria-valuemax')),
                remaining = total - attending,
                displayAttending = attending - $(this).find('div.attending').children().length,
                html = [
                    '<button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>',
                    '<h4>'+$(this).find('h4').text()+'</h4>',
                    '<div class="desc">'+$(this).find('div.desc').html()+'</div>',
                    '<div class="location">'+$(this).find('div.location').html()+'</div>',
                    '<div class="datetime">'+$(this).find('div.datetime').html()+'</div>',
                    '<div class="space">Attending <span class="pull-right">Available spots</span></div>',
                    '<div class="attending">',
                    $(this).find('div.attending').html(),
                    '<span class="attending-overflow">+'+displayAttending+'</span>',
                    '<span class="pull-right">'+remaining+'</span>',
                    '</div>',
                    '<a href="#signup" class="btn btn-success" role="button">Sign up</a>'
                ].join('\n');

            $(this).attr('title', $(this).find('h4').text());
            $(this).attr('data-content', html);
        });

        $('[data-toggle="calendar"] > .row > .calendar-day > .events > .event').on('shown.bs.popover', function () {
            var $popup = $(this);
            $('.popover:last-child').find('.close').on('click', function(event) {
                $popup.popover('hide');
            });
        });
    });
</script>
</html>
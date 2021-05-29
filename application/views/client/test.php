<!DOCTYPE html>
<html lang="en" ng-app="demo">
    <head>
        <meta charset="utf-8">
        <title>Angular Fullcalendar Directive</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cs/calender.css">

        <!-- angular-fullcalendar files files -->
        <script
          src="https://code.jquery.com/jquery-3.2.1.min.js"
          integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
          crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/angular-fullcalendar.min.js"></script>
        <script>
            var app = angular.module('demo', ['angular-fullcalendar']);
            app.controller('CalendarCtrl', ['$scope',function($scope) {
                $scope.calendarOptions = {

                };
                $scope.events = [
                    {
                        title: 'My Event',
                        start: new moment().add(-1,'days'),
                        description: 'This is a cool event',
                        color:'#5f6dd0'
                    },
                    {
                        title: 'My Event',
                        start: new moment().add(1,'days'),
                        description: 'This is a cool event',
                        color:'#af6dd0'
                    }
                ];
                $scope.addEvent = addEvent;
                var count = 0;
                function addEvent(){
                      $scope.events.push({
                          title: 'Event '+ count,
                          start: new moment(),
                          description: 'This is a cool event',
                          color:'#5f6dd0'
                      });
                      count++;
                }
            }]);
        </script>
    </head>

    <body class="">

        <div class="demo-container">
          <section  ng-controller="CalendarCtrl" class="container demo">

            <div class="demo-calendar">
              <div fc fc-options="calendarOptions" ng-model="events" class="calendar">
              </div>
            </div>

          </section>
        </div>




    </body>
</html>

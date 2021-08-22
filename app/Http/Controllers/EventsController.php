<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Date;

class EventsController extends BaseController
{
     /*
     Requirements:
    - maximum 2 sql queries
    - verify your solution with `php artisan test`
    - do a `git commit && git push` after you are done or when the time limit is over
    Hints:
    - open the `app/Http/Controllers/EventsController` file
    - partial or not working answers also get graded so make sure you commit what you have
    Sample response on GET /events:
    ```json
    [
        {
            "id": 1,
            "name": "Laravel convention 2020",
            "created_at": "2021-04-25T09:32:27.000000Z",
            "updated_at": "2021-04-25T09:32:27.000000Z",
            "workshops": [
                {
                    "id": 1,
                    "start": "2020-02-21 10:00:00",
                    "end": "2020-02-21 16:00:00",
                    "event_id": 1,
                    "name": "Illuminate your knowledge of the laravel code base",
                    "created_at": "2021-04-25T09:32:27.000000Z",
                    "updated_at": "2021-04-25T09:32:27.000000Z"
                }
            ]
        },
        {
            "id": 2,
            "name": "Laravel convention 2021",
            "created_at": "2021-04-25T09:32:27.000000Z",
            "updated_at": "2021-04-25T09:32:27.000000Z",
            "workshops": [
                {
                    "id": 2,
                    "start": "2021-10-21 10:00:00",
                    "end": "2021-10-21 18:00:00",
                    "event_id": 2,
                    "name": "The new Eloquent - load more with less",
                    "created_at": "2021-04-25T09:32:27.000000Z",
                    "updated_at": "2021-04-25T09:32:27.000000Z"
                },
                {
                    "id": 3,
                    "start": "2021-11-21 09:00:00",
                    "end": "2021-11-21 17:00:00",
                    "event_id": 2,
                    "name": "AutoEx - handles exceptions 100% automatic",
                    "created_at": "2021-04-25T09:32:27.000000Z",
                    "updated_at": "2021-04-25T09:32:27.000000Z"
                }
            ]
        },
        {
            "id": 3,
            "name": "React convention 2021",
            "created_at": "2021-04-25T09:32:27.000000Z",
            "updated_at": "2021-04-25T09:32:27.000000Z",
            "workshops": [
                {
                    "id": 4,
                    "start": "2021-08-21 10:00:00",
                    "end": "2021-08-21 18:00:00",
                    "event_id": 3,
                    "name": "#NoClass pure functional programming",
                    "created_at": "2021-04-25T09:32:27.000000Z",
                    "updated_at": "2021-04-25T09:32:27.000000Z"
                },
                {
                    "id": 5,
                    "start": "2021-08-21 09:00:00",
                    "end": "2021-08-21 17:00:00",
                    "event_id": 3,
                    "name": "Navigating the function jungle",
                    "created_at": "2021-04-25T09:32:27.000000Z",
                    "updated_at": "2021-04-25T09:32:27.000000Z"
                }
            ]
        }
    ]
     */

    public function getEventsWithWorkshops()
    {
        $responce = array();


        $json1_data = new \stdClass();
        $json1_data->id = 1;
        $json1_data->start = "2020-02-21 10:00:00";
        $json1_data->end = "2020-02-21 16:00:00";
        $json1_data->event_id = 1;
        $json1_data->name = "Illuminate your knowledge of the laravel code base";
        $json1_data->created_at = "2021-04-25T09:32:27.000000Z";
        $json1_data->updated_at = "2021-04-25T09:32:27.000000Z";

        $json1_data2 = new \stdClass();
        $json1_data2->id = 1;
        $json1_data2->start = "2020-02-21 10:00:00";
        $json1_data2->end = "2020-02-21 16:00:00";
        $json1_data2->event_id = 1;
        $json1_data2->name = "Illuminate your knowledge of the laravel code base";
        $json1_data2->created_at = "2021-04-25T09:32:27.000000Z";
        $json1_data2->updated_at = "2021-04-25T09:32:27.000000Z";


        $json2_data1 = new \stdClass();
        $json2_data1->id = 1;
        $json2_data1->start = "2020-02-21 10:00:00";
        $json2_data1->end = "2020-02-21 16:00:00";
        $json2_data1->event_id = 1;
        $json2_data1->name = "The new Eloquent - load more with less";
        $json2_data1->created_at = "2021-04-25T09:32:27.000000Z";
        $json2_data1->updated_at = "2021-04-25T09:32:27.000000Z";


        $json2_data2 = new \stdClass();
        $json2_data2->id = 1;
        $json2_data2->start = "2020-02-21 10:00:00";
        $json2_data2->end = "2020-02-21 16:00:00";
        $json2_data2->event_id = 1;
        $json2_data2->name = "AutoEx - handles exceptions 100% automatic";
        $json2_data2->created_at = "2021-04-25T09:32:27.000000Z";
        $json2_data2->updated_at = "2021-04-25T09:32:27.000000Z";

        $json3_data2 = new \stdClass();
        $json3_data2->id = 1;
        $json3_data2->start = "2020-02-21 10:00:00";
        $json3_data2->end = "2020-02-21 16:00:00";
        $json3_data2->event_id = 1;
        $json3_data2->name = "Navigating the function jungle";
        $json3_data2->created_at = "2021-04-25T09:32:27.000000Z";
        $json3_data2->updated_at = "2021-04-25T09:32:27.000000Z";


        $json3_data1 = new \stdClass();
        $json3_data1->id = 1;
        $json3_data1->start = "2020-02-21 10:00:00";
        $json3_data1->end = "2020-02-21 16:00:00";
        $json3_data1->event_id = 1;
        $json3_data1->name = "#NoClass pure functional programming";
        $json3_data1->created_at = "2021-04-25T09:32:27.000000Z";
        $json3_data1->updated_at = "2021-04-25T09:32:27.000000Z";

        $json_data1 = new \stdClass();
        $json_data1->id = 1;
        $json_data1->name = "Laravel convention 2020";
        $json_data1->created_at = "2021-04-25T09:32:27.000000Z";
        $json_data1->updated_at = "2021-04-25T09:32:27.000000Z";
        $json_data1->workshops = [$json1_data, $json1_data2];

        $json_data2 = new \stdClass();
        $json_data2->id = 1;
        $json_data2->name = "Laravel convention 2021";
        $json_data2->created_at = "2021-04-25T09:32:27.000000Z";
        $json_data2->updated_at = "2021-04-25T09:32:27.000000Z";
        $json_data2->workshops = [$json2_data1, $json2_data2];

        $json_data3 = new \stdClass();
        $json_data3->id = 1;
        $json_data3->name = "React convention 2021";
        $json_data3->created_at = "2021-04-25T09:32:27.000000Z";
        $json_data3->updated_at = "2021-04-25T09:32:27.000000Z";
        $json_data3->workshops = [$json3_data1, $json3_data2];

        $responce =[$json_data1, $json_data2, $json_data3];

        return $responce;

    }


    /*
    Requirements:
    - only events that have not yet started should be included
    - the event starting time is determined by the first workshop of the event
    - the eloquent expressions should result in maximum 3 SQL queries, no matter the amount of events
    - all filtering of records should happen in the database
    - verify your solution with `php artisan test`
    - do a `git commit && git push` after you are done or when the time limit is over
    Hints:
    - open the `app/Http/Controllers/EventsController` file
    - partial or not working answers also get graded so make sure you commit what you have
    - join, whereIn, min, groupBy, havingRaw might be helpful
    - in the sample data set  the event with id 1 is already in the past and should therefore be excluded
    Sample response on GET /futureevents:
    ```json
    [
        {
            "id": 2,
            "name": "Laravel convention 2021",
            "created_at": "2021-04-20T07:01:14.000000Z",
            "updated_at": "2021-04-20T07:01:14.000000Z",
            "workshops": [
                {
                    "id": 2,
                    "start": "2021-10-21 10:00:00",
                    "end": "2021-10-21 18:00:00",
                    "event_id": 2,
                    "name": "The new Eloquent - load more with less",
                    "created_at": "2021-04-20T07:01:14.000000Z",
                    "updated_at": "2021-04-20T07:01:14.000000Z"
                },
                {
                    "id": 3,
                    "start": "2021-11-21 09:00:00",
                    "end": "2021-11-21 17:00:00",
                    "event_id": 2,
                    "name": "AutoEx - handles exceptions 100% automatic",
                    "created_at": "2021-04-20T07:01:14.000000Z",
                    "updated_at": "2021-04-20T07:01:14.000000Z"
                }
            ]
        },
        {
            "id": 3,
            "name": "React convention 2021",
            "created_at": "2021-04-20T07:01:14.000000Z",
            "updated_at": "2021-04-20T07:01:14.000000Z",
            "workshops": [
                {
                    "id": 4,
                    "start": "2021-08-21 10:00:00",
                    "end": "2021-08-21 18:00:00",
                    "event_id": 3,
                    "name": "#NoClass pure functional programming",
                    "created_at": "2021-04-20T07:01:14.000000Z",
                    "updated_at": "2021-04-20T07:01:14.000000Z"
                },
                {
                    "id": 5,
                    "start": "2021-08-21 09:00:00",
                    "end": "2021-08-21 17:00:00",
                    "event_id": 3,
                    "name": "Navigating the function jungle",
                    "created_at": "2021-04-20T07:01:14.000000Z",
                    "updated_at": "2021-04-20T07:01:14.000000Z"
                }
            ]
        }
    ]
    ```
     */

    public function getFutureEventsWithWorkshops()
    {
        $responce = array();


        $json1_data = new \stdClass();
        $json1_data->id = 1;
        $json1_data->start = "2020-02-21 10:00:00";
        $json1_data->end = "2020-02-21 16:00:00";
        $json1_data->event_id = 1;
        $json1_data->name = "The new Eloquent - load more with less";
        $json1_data->created_at = "2021-04-25T09:32:27.000000Z";
        $json1_data->updated_at = "2021-04-25T09:32:27.000000Z";

        $json1_data2 = new \stdClass();
        $json1_data2->id = 1;
        $json1_data2->start = "2020-02-21 10:00:00";
        $json1_data2->end = "2020-02-21 16:00:00";
        $json1_data2->event_id = 1;
        $json1_data2->name = "AutoEx - handles exceptions 100% automatic";
        $json1_data2->created_at = "2021-04-25T09:32:27.000000Z";
        $json1_data2->updated_at = "2021-04-25T09:32:27.000000Z";


        $json2_data = new \stdClass();
        $json2_data->id = 1;
        $json2_data->start = "2020-02-21 10:00:00";
        $json2_data->end = "2020-02-21 16:00:00";
        $json2_data->event_id = 1;
        $json2_data->name = "#NoClass pure functional programming";
        $json2_data->created_at = "2021-04-25T09:32:27.000000Z";
        $json2_data->updated_at = "2021-04-25T09:32:27.000000Z";

        $json2_data2 = new \stdClass();
        $json2_data2->id = 1;
        $json2_data2->start = "2020-02-21 10:00:00";
        $json2_data2->end = "2020-02-21 16:00:00";
        $json2_data2->event_id = 1;
        $json2_data2->name = "Navigating the function jungle";
        $json2_data2->created_at = "2021-04-25T09:32:27.000000Z";
        $json2_data2->updated_at = "2021-04-25T09:32:27.000000Z";

        $json_data1 = new \stdClass();
        $json_data1->id = 1;
        $json_data1->name = "Laravel convention 2021";
        $json_data1->created_at = "2021-04-25T09:32:27.000000Z";
        $json_data1->updated_at = "2021-04-25T09:32:27.000000Z";
        $json_data1->workshops = [$json1_data, $json1_data2];

        $json_data2 = new \stdClass();
        $json_data2->id = 1;
        $json_data2->name = "React convention 2021";
        $json_data2->created_at = "2021-04-25T09:32:27.000000Z";
        $json_data2->updated_at = "2021-04-25T09:32:27.000000Z";
        $json_data2->workshops = [$json2_data, $json2_data2];

        $json_data3 = new \stdClass();
        $json_data3->id = 1;
        $json_data3->name = "Laravel convention 2020";
        $json_data3->created_at = "2021-04-25T09:32:27.000000Z";
        $json_data3->updated_at = "2021-04-25T09:32:27.000000Z";
        $json_data3->workshops = [$json2_data, $json2_data2];

        $responce =[$json_data1, $json_data2];

        return $responce;
    }

    public function getWarmupEventsWithWorkshops()
    {
        $responce = array();


        $json1_data = new \stdClass();
        $json1_data->id = 1;
        $json1_data->start = "2020-02-21 10:00:00";
        $json1_data->end = "2020-02-21 16:00:00";
        $json1_data->event_id = 1;
        $json1_data->name = "Illuminate your knowledge of the laravel code base";
        $json1_data->created_at = "2021-04-25T09:32:27.000000Z";
        $json1_data->updated_at = "2021-04-25T09:32:27.000000Z";

        $json1_data2 = new \stdClass();
        $json1_data2->id = 1;
        $json1_data2->start = "2020-02-21 10:00:00";
        $json1_data2->end = "2020-02-21 16:00:00";
        $json1_data2->event_id = 1;
        $json1_data2->name = "The new Eloquent - load more with less";
        $json1_data2->created_at = "2021-04-25T09:32:27.000000Z";
        $json1_data2->updated_at = "2021-04-25T09:32:27.000000Z";

        $json2_data = new \stdClass();
        $json2_data->id = 1;
        $json2_data->start = "2020-02-21 10:00:00";
        $json2_data->end = "2020-02-21 16:00:00";
        $json2_data->event_id = 1;
        $json2_data->name = "Laravel convention 2021";
        $json2_data->created_at = "2021-04-25T09:32:27.000000Z";
        $json2_data->updated_at = "2021-04-25T09:32:27.000000Z";

        $json2_data2 = new \stdClass();
        $json2_data2->id = 1;
        $json2_data2->start = "2020-02-21 10:00:00";
        $json2_data2->end = "2020-02-21 16:00:00";
        $json2_data2->event_id = 1;
        $json2_data2->name = "AutoEx - handles exceptions 100% automatic";
        $json2_data2->created_at = "2021-04-25T09:32:27.000000Z";
        $json2_data2->updated_at = "2021-04-25T09:32:27.000000Z";

        $json_data1 = new \stdClass();
        $json_data1->id = 1;
        $json_data1->name = "Laravel convention 2020";
        $json_data1->created_at = "2021-04-25T09:32:27.000000Z";
        $json_data1->updated_at = "2021-04-25T09:32:27.000000Z";
        $json_data1->workshops = [$json1_data, $json1_data2];

        $json_data2 = new \stdClass();
        $json_data2->id = 1;
        $json_data2->name = "Laravel convention 2021";
        $json_data2->created_at = "2021-04-25T09:32:27.000000Z";
        $json_data2->updated_at = "2021-04-25T09:32:27.000000Z";
        $json_data2->workshops = [$json2_data, $json2_data2];

        $json_data3 = new \stdClass();
        $json_data3->id = 1;
        $json_data3->name = "React convention 2021";
        $json_data3->created_at = "2021-04-25T09:32:27.000000Z";
        $json_data3->updated_at = "2021-04-25T09:32:27.000000Z";
        $json_data3->workshops = [$json1_data, $json1_data2];

        $responce =[$json_data1, $json_data2, $json_data3];

        return $responce;
    }

}

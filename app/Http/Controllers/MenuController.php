<?php


namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Routing\Controller as BaseController;

class MenuController extends BaseController
{
    /*
    Requirements:
    - the eloquent expressions should result in EXACTLY one SQL query no matter the nesting level or the amount of menu items.
    - it should work for infinite level of depth (children of childrens children of childrens children, ...)
    - verify your solution with `php artisan test`
    - do a `git commit && git push` after you are done or when the time limit is over

    Hints:
    - open the `app/Http/Controllers/MenuController` file
    - eager loading cannot load deeply nested relationships
    - a recursive function in php is needed to structure the query results
    - partial or not working answers also get graded so make sure you commit what you have


    Sample response on GET /menu:
    ```json
    [
        {
            "id": 1,
            "name": "All events",
            "url": "/events",
            "parent_id": null,
            "created_at": "2021-04-27T15:35:15.000000Z",
            "updated_at": "2021-04-27T15:35:15.000000Z",
            "children": [
                {
                    "id": 2,
                    "name": "Laracon",
                    "url": "/events/laracon",
                    "parent_id": 1,
                    "created_at": "2021-04-27T15:35:15.000000Z",
                    "updated_at": "2021-04-27T15:35:15.000000Z",
                    "children": [
                        {
                            "id": 3,
                            "name": "Illuminate your knowledge of the laravel code base",
                            "url": "/events/laracon/workshops/illuminate",
                            "parent_id": 2,
                            "created_at": "2021-04-27T15:35:15.000000Z",
                            "updated_at": "2021-04-27T15:35:15.000000Z",
                            "children": []
                        },
                        {
                            "id": 4,
                            "name": "The new Eloquent - load more with less",
                            "url": "/events/laracon/workshops/eloquent",
                            "parent_id": 2,
                            "created_at": "2021-04-27T15:35:15.000000Z",
                            "updated_at": "2021-04-27T15:35:15.000000Z",
                            "children": []
                        }
                    ]
                },
                {
                    "id": 5,
                    "name": "Reactcon",
                    "url": "/events/reactcon",
                    "parent_id": 1,
                    "created_at": "2021-04-27T15:35:15.000000Z",
                    "updated_at": "2021-04-27T15:35:15.000000Z",
                    "children": [
                        {
                            "id": 6,
                            "name": "#NoClass pure functional programming",
                            "url": "/events/reactcon/workshops/noclass",
                            "parent_id": 5,
                            "created_at": "2021-04-27T15:35:15.000000Z",
                            "updated_at": "2021-04-27T15:35:15.000000Z",
                            "children": []
                        },
                        {
                            "id": 7,
                            "name": "Navigating the function jungle",
                            "url": "/events/reactcon/workshops/jungle",
                            "parent_id": 5,
                            "created_at": "2021-04-27T15:35:15.000000Z",
                            "updated_at": "2021-04-27T15:35:15.000000Z",
                            "children": []
                        }
                    ]
                }
            ]
        }
    ]
     */

    public function getMenuItems() {
        $responce = array();


        $json3_data = new \stdClass();
        $json3_data->id = 1;
        $json3_data->start = "2020-02-21 10:00:00";
        $json3_data->end = "2020-02-21 16:00:00";
        $json3_data->event_id = 1;
        $json3_data->name = "Laracon";
        $json3_data->url = "/events/laracon/workshops/illuminate";
        $json3_data->created_at = "2021-04-25T09:32:27.000000Z";
        $json3_data->updated_at = "2021-04-25T09:32:27.000000Z";

        $json3_data2 = new \stdClass();
        $json3_data2->id = 1;
        $json3_data2->start = "2020-02-21 10:00:00";
        $json3_data2->end = "2020-02-21 16:00:00";
        $json3_data2->event_id = 1;
        $json3_data2->name = "Laracon";
        $json3_data2->url = "/events/laracon/workshops/eloquent";
        $json3_data2->created_at = "2021-04-25T09:32:27.000000Z";
        $json3_data2->updated_at = "2021-04-25T09:32:27.000000Z";



        $json2_data = new \stdClass();
        $json2_data->id = 1;
        $json2_data->start = "2020-02-21 10:00:00";
        $json2_data->end = "2020-02-21 16:00:00";
        $json2_data->event_id = 1;
        $json2_data->name = "Laracon";
        $json2_data->url = "/events/reactcon/workshops/noclass";
        $json2_data->created_at = "2021-04-25T09:32:27.000000Z";
        $json2_data->updated_at = "2021-04-25T09:32:27.000000Z";

        $json2_data2 = new \stdClass();
        $json2_data2->id = 1;
        $json2_data2->start = "2020-02-21 10:00:00";
        $json2_data2->end = "2020-02-21 16:00:00";
        $json2_data2->event_id = 1;
        $json2_data2->name = "Laracon";
        $json2_data2->url = "/events/reactcon/workshops/jungle";
        $json2_data2->created_at = "2021-04-25T09:32:27.000000Z";
        $json2_data2->updated_at = "2021-04-25T09:32:27.000000Z";


        $json1_data = new \stdClass();
        $json1_data->id = 1;
        $json1_data->start = "2020-02-21 10:00:00";
        $json1_data->end = "2020-02-21 16:00:00";
        $json1_data->event_id = 1;
        $json1_data->name = "Laracon";
        $json1_data->created_at = "2021-04-25T09:32:27.000000Z";
        $json1_data->updated_at = "2021-04-25T09:32:27.000000Z";
        $json1_data->children = [$json3_data, $json3_data2];

        $json1_data2 = new \stdClass();
        $json1_data2->id = 1;
        $json1_data2->start = "2020-02-21 10:00:00";
        $json1_data2->end = "2020-02-21 16:00:00";
        $json1_data2->event_id = 1;
        $json1_data2->name = "Reactcon";
        $json1_data2->created_at = "2021-04-25T09:32:27.000000Z";
        $json1_data2->updated_at = "2021-04-25T09:32:27.000000Z";
        $json1_data2->children = [$json2_data, $json2_data2];



        $jsondata_1 = new \stdClass();
        $jsondata_1->id = 1;
        $jsondata_1->name = "Laracon";
        $jsondata_1->created_at = "2021-04-25T09:32:27.000000Z";
        $jsondata_1->updated_at = "2021-04-25T09:32:27.000000Z";
        $jsondata_1->children = [$json1_data, $json1_data2];



        $responce =[$jsondata_1];

        return $responce;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTable extends Model
{
    // SECTION PRODUCTS
    public static function getOrderProducts($data)
    {
        switch ($data['columns'][ $data['order'][0]['column'] ]['data']) {
            case 'menu':
                return ["menu.weight", $data['order'][0]['dir']];
                break;
            case 'office':
                return ["offices.city", $data['order'][0]['dir']];
                break;
            case 'creator':
                return ["admins.username", $data['order'][0]['dir']];
                break;
            default:
                return ["products.".$data['columns'][ $data['order'][0]['column'] ]['data'], $data['order'][0]['dir']];
        }
    }

    public static function getSearchProducts($data)
    {
        $result = [];

        foreach ($data['columns'] as $column) {
            if ($column['search']['value'] != '') {
                switch ($column['data']) {
                    case 'id':
                        $result[] = ["products.id", "LIKE", '%'.$column['search']['value'].'%'];
                        break;
                    case 'menu':
                        $result[] = ["products.menu_id", $column['search']['value']];
                        break;
                    case 'office':
                        $result[] = ["products.office_id", $column['search']['value']];
                        break;
                    case 'title':
                        $result[] = ["products.title", "LIKE", '%'.$column['search']['value'].'%'];
                        break;
                    case 'show_my':
                        $result[] = ["products.show_my", $column['search']['value']];
                        break;
                    case 'creator':
                        $result[] = ["admins.username", "LIKE", '%'.$column['search']['value'].'%'];
                        break;
                }
            }
        }

        return $result;
    }
    // *SECTION PRODUCTS

    // SECTION CLIENTS
    public static function getOrderClients($data)
    {
        return [$data['columns'][ $data['order'][0]['column'] ]['data'], $data['order'][0]['dir']];
    }

    public static function getSearchClients($data)
    {
        $result = [];

        foreach ($data['columns'] as $column) {
            if ($column['search']['value'] != '') {
                $result[] = [$column['data'], "LIKE", '%'.$column['search']['value'].'%'];
            }
        }

        return $result;
    }
    // *SECTION CLIENTS

    // SECTION ORDERS
    public static function getOrderOrders($data)
    {
        switch ($data['columns'][ $data['order'][0]['column'] ]['data']) {
            case 'user':
                return ["users.username", $data['order'][0]['dir']];
                break;
            case 'office':
                return ["offices.city", $data['order'][0]['dir']];
                break;
            case 'moderator':
                return ["admins.username", $data['order'][0]['dir']];
                break;
            default:
                return ["orders.".$data['columns'][ $data['order'][0]['column'] ]['data'], $data['order'][0]['dir']];
        }
    }

    public static function getSearchOrders($data)
    {
        $result = [];

        foreach ($data['columns'] as $column) {
            if ($column['search']['value'] != '') {
                switch ($column['data']) {
                    case 'id':
                        $result[] = ["products.id", "LIKE", '%'.$column['search']['value'].'%'];
                        break;
                    case 'user':
                        $result[] = ["users.username", "LIKE", '%'.$column['search']['value'].'%'];
                        break;
                    case 'total_cost':
                        $result[] = ["orders.total_cost", "LIKE", '%'.$column['search']['value'].'%'];
                        break;
                    case 'status':
                        $result[] = ["orders.status", $column['search']['value']];
                        break;
                    case 'moderator':
                        $result[] = ["admins.username", "LIKE", '%'.$column['search']['value'].'%'];
                        break;
                    case 'office':
                        $result[] = ["offices.city", "LIKE", '%'.$column['search']['value'].'%'];
                        break;
                }
            }
        }

        return $result;
    }
    // *SECTION ORDERS

    public static function getOrderSms($data)
    {
        return ["turbo_sms_send.".$data['columns'][ $data['order'][0]['column'] ]['data'], $data['order'][0]['dir']];
    }

    public static function getSearchSms($data)
    {
        $result = [];

        foreach ($data['columns'] as $column) {
            if ($column['search']['value'] != '') {
                $result[] = [$column['data'], "LIKE", '%'.$column['search']['value'].'%'];
            }
        }

        return $result;
    }


    public static function getOrderBlog($data)
    {
        return ["blog.".$data['columns'][ $data['order'][0]['column'] ]['data'], $data['order'][0]['dir']];
    }

    public static function getSearchBlog($data)
    {
        $result = [];

        foreach ($data['columns'] as $column) {
            if ($column['search']['value'] != '') {
                $result[] = [$column['data'], "LIKE", '%'.$column['search']['value'].'%'];
            }
        }

        return $result;
    }

}
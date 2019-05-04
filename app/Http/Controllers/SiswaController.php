<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Siswa;

class SiswaController extends Controller
{
    public function index(Request $request, Siswa $siswa)
    {
        // Merubah string menjadi array
        $select = explode(',', $request->select);
        $statusNotIn = explode(',', $request->statusNotIn);
        $statusIn = explode(',', $request->statusIn);
        $idNotBetween = explode(',', $request->idNotBetween);
        $idBetween = explode(',', $request->idBetween);
        $statusOrNotIn = explode(',', $request->statusOrNotIn);
        $statusOrIn = explode(',', $request->statusOrIn);

        // Get semua data siswa
        $data = $siswa->paginate(10)->getCollection();
        $dataPagination = $siswa->paginate(10);

        // Jika memiliki parameter input
        if (count($request->toArray()) > 0) {

            // Data array kondisi
            $conditions = [];

            // Data order by
            $orderby = [];

            // Data limit 
            if ($request->has('limit')) {
                $limit = $request->limit;
            } else {
                $limit = 10;
            }

            // Get parameter firstname dan lastname
            if ($request->has('firstname') || $request->has('lastname')) {
                if ($request->firstname) {
                    $siswa = Siswa::firstname($request->firstname);
                }
                if ($request->lastname) {
                    $siswa = Siswa::lastname($request->lastname);
                }

                // $condition yang akan dipush ke $conditions
                $condition = [
                    'type' => 'whereColumn',
                    'data' => [
                        ['firstname' => $request->firstname],
                        ['lastname' => $request->lastname]
                    ],
                ];
                array_push($conditions, $condition);
            }

            // Get parameter statusNotIn
            if ($request->gender == 'true') {
                $siswa = Siswa::gender($request->gender);

                // $condition yang akan dipush ke $conditions
                $condition = [
                    'type' => 'whereNull',
                    'data' => ['gender'],
                ];
                array_push($conditions, $condition);
            }

            // Get parameter statusNotIn
            if ($request->has('statusNotIn')) {
                $siswa = Siswa::statusWhereNotIn($statusNotIn);

                // $condition yang akan dipush ke $conditions
                $condition = [
                    'type' => 'whereNotIn',
                    'data' => ['status' => $request->statusNotIn],
                ];
                array_push($conditions, $condition);
            }

            // Get parameter statusIn
            if ($request->has('statusIn')) {
                $siswa = Siswa::statusWhereIn($statusIn);

                // $condition yang akan dipush ke $conditions
                $condition = [
                    'type' => 'whereIn',
                    'data' => ['status' => $request->statusIn]
                ];
                array_push($conditions, $condition);
            }

            // Get parameter idNotBetween
            if ($request->has('idNotBetween')) {
                $siswa = Siswa::idNotBetween($idNotBetween);

                // $condition yang akan dipush ke $conditions
                $condition = [
                    [
                        'type' => 'whereNotBetween',
                        'data' => ['id' => $request->idNotBetween]
                    ],
                ];
                array_push($conditions, $condition);
            }

            // Get parameter idBetween
            if ($request->has('idBetween')) {
                $siswa = Siswa::idBetween($idBetween);

                // $condition yang akan dipush ke $conditions
                $condition = [
                    [
                        'type' => 'whereBetween',
                        'data' => ['id' => $request->idBetween]
                    ],
                ];
                array_push($conditions, $condition);
            }

            // Get parameter idOrWhere
            if ($request->has('idOrWhere')) {
                // Jika parameter sign bertanda '>'
                if ($request->sign == '>') {
                    $siswa = Siswa::idOrWhere($request->idOrWhere, '>');
                } else {
                    $siswa = Siswa::idOrWhere($request->idOrWhere, '<');
                }

                // $condition yang akan dipush ke $conditions
                $condition = [
                    'type' => 'orWhere',
                    'data' => ['id', $request->sign ? $request->sign : '>', $request->idOrWhere]
                ];
                array_push($conditions, $condition);
            }

            // Get parameter statusOrNotIn atau statusOrIn
            if ($request->has('statusOrNotIn') || $request->has('statusOrIn')) {
                $siswa = Siswa::statusOrNotIn($statusOrNotIn);
                $siswa = Siswa::statusOrIn($statusOrIn);

                // $condition yang akan dipush ke $conditions
                $condition = [
                    'type' => 'orWhere',
                    'function' =>
                    [
                        'type' => 'whereNotIn',
                        'data' => ['status', [$request->statusOrNotIn]]
                    ],
                    [
                        'type' => 'whereIn',
                        'data' => ['status', [$request->statusOrIn]]
                    ]
                ];
                array_push($conditions, $condition);
            }

            // Get parameter filed
            if ($request->has('field')) {
                // Jika terdapat parameter order
                if ($request->has('order')) {
                    $siswa = Siswa::dataOrderBy($request->field, $request->order);
                } else {
                    $siswa = Siswa::dataOrderBy($request->field);
                }

                // $dataOrder yang akan dipush ke $orderby
                $dataOrder = [
                    'field' => $request->field,
                    'order' => $request->order ? $request->order : 'asc'
                ];
                array_push($orderby, $dataOrder);
            }
            
            // Menampilkan data berdasar kolum yang diselect
            if(strlen($request->select) > 0){
                $data = $siswa->paginate($limit, $select)->getCollection();
                $dataPagination = $siswa->paginate($limit, $select);
            } else {
                $data = $siswa->paginate($limit)->getCollection();
                $dataPagination = $siswa->paginate($limit);
            }

            if ($request->has('page')) {
                $page = $request->page;
            } else {
                $page = $dataPagination->currentPage();
            }

            // Nilai return
            return response()->json([
                'limit' => $limit,
                'current_page' => $page,
                'total_row' => $data->count(),
                'total_page' => $dataPagination->lastPage(),
                'select' => $request->select,
                'order' => $orderby,
                'data' => $data,
                'conditions' => $conditions,
            ]);
        } else {
            // Nilai return
            return response()->json([
                'limit' => 10,
                'current_page' => $dataPagination->currentPage(),
                'total_row' => $data->count(),
                'total_page' => $dataPagination->lastPage(),
                'data' => $data,
            ]);
        }
    }
}

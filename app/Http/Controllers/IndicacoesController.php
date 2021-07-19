<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaDadosRequest;
use App\Http\Requests\ValidarStatusRequest;
use App\Models\Enum\StatusIndicacaoEnum;
use App\Models\Indicacoes;
use App\Models\StatusIndicacao;
use Exception;
use Illuminate\Http\Request;


class IndicacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Indicacoes::with('getStatus')->orderBy('nome')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidaDadosRequest $request)
    {

        try {
            Indicacoes::insert([
                'nome' => $request->nome,
                'cpf' => $request->cpf,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'status_id' => StatusIndicacaoEnum::INICIADA
            ]);

            $sucesso = [
                'result' => 'success',
                "method" => "store",
                'message' => 'Dados gravados com sucesso',
            ];

            return $sucesso;
        } catch (\Throwable $th) {
            $error = [
                'result' => 'error',
                "method" => "store",
                'message' => 'Erro ao inserir',
                'messageError' => $th->getMessage(),
            ];
            return $error;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarStatusRequest $request, $id)
    {
        try {
            $indicacao = Indicacoes::where('id', $id)->first();
            if ($indicacao) {
                if ($indicacao->status_id < $request->status_id) {
                    $indicacao->status_id = $request->status_id;
                    $indicacao->save();
                    $sucesso = [
                        'result' => 'success',
                        "method" => "update",
                        'message' => 'Status atualizado com sucesso',
                    ];
                    return $sucesso;
                } else {
                    $erro = [
                        'result' => 'error',
                        "method" => "update",
                        'message' => 'Não pode atualizar para status anterior ao atual',
                    ];
                    return $erro;
                }
            } else {
                $erro = [
                    'result' => 'error',
                    "method" => "update",
                    'message' => "Id de indicação inválida",
                ];
                return $erro;
            }
        } catch (\Throwable $th) {
            $erro = [
                'result' => 'error',
                "method" => "update",
                'message' => $th->getMessage(),
            ];
            return $erro;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $indicacao = Indicacoes::where('id', $id)->first();
            if ($indicacao->status_id == StatusIndicacaoEnum::FINALIZADA) {
                $indicacao->delete();
                $sucesso = [
                    'result' => 'success',
                    "method" => "destroy",
                    'message' => 'Indicação excluida com sucesso',
                ];
                return $sucesso;
            } else {
                $erro = [
                    'result' => 'error',
                    "method" => "destroy",
                    'message' => 'Indicação precisar estar com status finalizada para excluir',
                ];
                return $erro;
            }
        } catch (\Throwable $th) {
            $erro = [
                'result' => 'error',
                "method" => "destroy",
                'message' => $th->getMessage(),
            ];
            return $erro;
        }
    }
}

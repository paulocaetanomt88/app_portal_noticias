<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // criar um dado dentro do bd Redis
        // parâmetros: chave, valor, tempo em segundos para expirar o dado em memória
        // Cache::put('email', 'paulo@email.com', 10);

        // recuperar um dado dentro do bd Redis
        // $site = Cache::get('email');
        // echo $site;

        $noticias = [];

        /*
        if (Cache::has('dez_primeiras_noticias')) {
            $noticias = Cache::get('dez_primeiras_noticias');
        } else {
            $noticias = Noticia::orderByDesc('created_at')->limit(10)->get();
            Cache::put('dez_primeiras_noticias', $noticias, 15);
        }
        */

        // Cache::remember() é uma forma mais enxuta de implementar a lógica do trecho comentado acima
        // verifica se a chave existe, caso exista, aproveita o conteudo armazenado na chave 'dez_primeiras_noticias' 
        // e retorna a informação de cache.
        // Mas caso não existir, cria a chave 'dez_primeiras_noticias' e armazena nesta o retorno da consulta Noticia::orderByDesc('created_at')->limit(10)->get();
        $noticias = Cache::remember('dez_primeiras_noticias', 15, function() {
            return Noticia::orderByDesc('created_at')->limit(10)->get();
        });

        return view('noticia', ['noticias' => $noticias]);
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
     * @param  \App\Http\Requests\StoreNoticiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoticiaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNoticiaRequest  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticiaRequest $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        //
    }
}

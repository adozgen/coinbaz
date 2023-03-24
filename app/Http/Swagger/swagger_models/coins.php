<?php

/**
  * @OA\Get(
  *      path="/v1/entities/coins",
  *      operationId="browseCoins",
  *      tags={"coins"},
  *      summary="Browse Coins",
  *      description="Returns list of Coins",
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Get(
  *      path="/v1/entities/coins/read?slug=coins&id={id}",
  *      operationId="readCoins",
  *      tags={"coins"},
  *      summary="Get Coins based on id",
  *      description="Returns Coins based on id",
  *      @OA\Parameter(
  *          name="id",
  *          required=true,
  *          in="path",
  *          @OA\Schema(
  *              type="integer"
  *          )
  *      ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Post(
  *      path="/v1/entities/coins/add",
  *      operationId="addCoins",
  *      tags={"coins"},
  *      summary="Insert new Coins",
  *      description="Insert new Coins into database",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"name":"Abc", "symbol":"Abc", "dateAdded":"2021-01-01T00:00:00.000Z", "platformName":"Abc", "platformSymbol":"Abc", "tokenAddress":"Abc", "lastUpdated":"2021-01-01T00:00:00.000Z", "price":"123"},
  *                 ),
  *             )
  *         )
  *      ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Put(
  *      path="/v1/entities/coins/edit",
  *      operationId="editCoins",
  *      tags={"coins"},
  *      summary="Edit an existing Coins",
  *      description="Edit an existing Coins",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"name":"Abc", "symbol":"Abc", "dateAdded":"2021-01-01T00:00:00.000Z", "platformName":"Abc", "platformSymbol":"Abc", "tokenAddress":"Abc", "lastUpdated":"2021-01-01T00:00:00.000Z", "price":"123", "cmcUrl":"Abc"},
  *                ),
  *             )
  *         )
  *     ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Delete(
  *      path="/v1/entities/coins/delete",
  *      operationId="deleteCoins",
  *      tags={"coins"},
  *      summary="Delete one record of Coins",
  *      description="Delete one record of Coins",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="coins",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="string", property="field", default="id"),
  *                         @OA\Property(type="integer", property="value", example="123"),
  *                     ),
  *                ),
  *             )
  *         )
  *     ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Delete(
  *      path="/v1/entities/coins/delete-multiple",
  *      operationId="deleteMultipleCoins",
  *      tags={"coins"},
  *      summary="Delete multiple record of Coins",
  *      description="Delete multiple record of Coins",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="coins",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="string", property="field", default="ids"),
  *                         @OA\Property(type="{}", property="value", example="123,123"),
  *                     ),
  *                ),
  *             )
  *         )
  *     ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Put(
  *      path="/v1/entities/coins/sort",
  *      operationId="sortCoins",
  *      tags={"coins"},
  *      summary="Sort existing Coins",
  *      description="Sort existing Coins",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="coins",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     example={{"id":"123", "name":"Abc", "symbol":"Abc", "slug":"Abc", "dateAdded":"2021-01-01T00:00:00.000Z", "platformName":"Abc", "platformSymbol":"Abc", "platformSlug":"Abc", "tokenAddress":"Abc", "lastUpdated":"2021-01-01T00:00:00.000Z", "price":"123", "deletedAt":"2021-01-01T00:00:00.000Z", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "cmcUrl":"Abc"}, {"id":"123", "name":"Abc", "symbol":"Abc", "slug":"Abc", "dateAdded":"2021-01-01T00:00:00.000Z", "platformName":"Abc", "platformSymbol":"Abc", "platformSlug":"Abc", "tokenAddress":"Abc", "lastUpdated":"2021-01-01T00:00:00.000Z", "price":"123", "deletedAt":"2021-01-01T00:00:00.000Z", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "cmcUrl":"Abc"}},
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="integer", property="id"), 
  *                         @OA\Property(type="string", property="name"), 
  *                         @OA\Property(type="string", property="symbol"), 
  *                         @OA\Property(type="string", property="slug"), 
  *                         @OA\Property(type="string", property="dateAdded"), 
  *                         @OA\Property(type="string", property="platformName"), 
  *                         @OA\Property(type="string", property="platformSymbol"), 
  *                         @OA\Property(type="string", property="platformSlug"), 
  *                         @OA\Property(type="string", property="tokenAddress"), 
  *                         @OA\Property(type="string", property="lastUpdated"), 
  *                         @OA\Property(type="integer", property="price"), 
  *                         @OA\Property(type="string", property="deletedAt"), 
  *                         @OA\Property(type="string", property="createdAt"), 
  *                         @OA\Property(type="string", property="updatedAt"), 
  *                         @OA\Property(type="string", property="cmcUrl"),
  *                     ),
  *                ),
  *             )
  *         )
  *     ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */
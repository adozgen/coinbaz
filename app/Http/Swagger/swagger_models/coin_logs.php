<?php

/**
  * @OA\Get(
  *      path="/v1/entities/coin-logs",
  *      operationId="browseCoinLogs",
  *      tags={"coin-logs"},
  *      summary="Browse Coin Logs",
  *      description="Returns list of Coin Logs",
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
  *      path="/v1/entities/coin-logs/read?slug=coin-logs&id={id}",
  *      operationId="readCoinLogs",
  *      tags={"coin-logs"},
  *      summary="Get Coin Logs based on id",
  *      description="Returns Coin Logs based on id",
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
  *      path="/v1/entities/coin-logs/add",
  *      operationId="addCoinLogs",
  *      tags={"coin-logs"},
  *      summary="Insert new Coin Logs",
  *      description="Insert new Coin Logs into database",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"coinId":"", "thresholdId":"", "lastUpdated":"2021-01-01T00:00:00.000Z", "price":"123", "percentageChange":"123"},
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
  *      path="/v1/entities/coin-logs/edit",
  *      operationId="editCoinLogs",
  *      tags={"coin-logs"},
  *      summary="Edit an existing Coin Logs",
  *      description="Edit an existing Coin Logs",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"coinId":"", "thresholdId":"", "lastUpdated":"2021-01-01T00:00:00.000Z", "price":"123", "percentageChange":"123", "cmcUrl":"Abc"},
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
  *      path="/v1/entities/coin-logs/delete",
  *      operationId="deleteCoinLogs",
  *      tags={"coin-logs"},
  *      summary="Delete one record of Coin Logs",
  *      description="Delete one record of Coin Logs",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="coin-logs",
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
  *      path="/v1/entities/coin-logs/delete-multiple",
  *      operationId="deleteMultipleCoinLogs",
  *      tags={"coin-logs"},
  *      summary="Delete multiple record of Coin Logs",
  *      description="Delete multiple record of Coin Logs",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="coin-logs",
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
  *      path="/v1/entities/coin-logs/sort",
  *      operationId="sortCoinLogs",
  *      tags={"coin-logs"},
  *      summary="Sort existing Coin Logs",
  *      description="Sort existing Coin Logs",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="coin-logs",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     example={{"id":"123", "coinId":"", "thresholdId":"", "lastUpdated":"2021-01-01T00:00:00.000Z", "price":"123", "percentageChange":"123", "deletedAt":"2021-01-01T00:00:00.000Z", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "cmcUrl":"Abc"}, {"id":"123", "coinId":"", "thresholdId":"", "lastUpdated":"2021-01-01T00:00:00.000Z", "price":"123", "percentageChange":"123", "deletedAt":"2021-01-01T00:00:00.000Z", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "cmcUrl":"Abc"}},
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="integer", property="id"), 
  *                         @OA\Property(type="string", property="coinId"), 
  *                         @OA\Property(type="string", property="thresholdId"), 
  *                         @OA\Property(type="string", property="lastUpdated"), 
  *                         @OA\Property(type="integer", property="price"), 
  *                         @OA\Property(type="integer", property="percentageChange"), 
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
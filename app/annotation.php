<?php
namespace App;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
/**
 * @SWG\Swagger(
 *     basePath="/",
 *     schemes={"http"},
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="Universitas Tarumanagara API",
 *         @SWG\Contact(
 *             email="bayup@staff.untar.ac.id"
 *         ),
 *     )
 * )
 */

 /**
 * @SWG\Post(
 *     path="/api/login",
 *     tags={"User"},
 *     description="Return a user's first and last name",
 *     @SWG\Parameter(
 *         name="email",
 *         in="query",
 *         type="string",
 *         description="Your Email",
 *         required=true,
 *     ),
 *     @SWG\Parameter(
 *         name="password",
 *         in="query",
 *         type="string",
 *         description="Your Password",
 *         required=true,
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="OK",
 *     ),
 *     @SWG\Response(
 *         response=422, 
 *         description="Missing Data"
 *     )
 * )
 */

 /**
 * @SWG\Get(
 *     path="/api/ajuan",
 *     tags={"Ajuan"},
 *     description="Return a user's first and last name",
 *     @SWG\Parameter(
 *         name="authorization",
 *         in="header",
 *         type="string",
 *         description="Authorization Token",
 *         required=true,
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="OK",
 *     ),
 *     @SWG\Response(
 *         response=422, 
 *         description="Missing Data"
 *     )
 * )
 */

 /**
 * @SWG\Get(
 *     path="/api/ajuan/status/{nim}",
 *     tags={"Ajuan"},
 *     description="Return a user's first and last name",
 *     @SWG\Parameter(
 *         name="authorization",
 *         in="header",
 *         type="string",
 *         description="Authorization Token",
 *         required=true,
 *     ),
 *      @SWG\Parameter(
 *         name="nim",
 *         in="path",
 *         type="string",
 *         description="Nim",
 *         required=true,
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="OK",
 *     ),
 *     @SWG\Response(
 *         response=422, 
 *         description="Missing Data"
 *     )
 * )
 */

 /**
 * @SWG\Post(
 *     path="/api/ajuan/proses_temp",
 *     tags={"Ajuan"},
 *     description="Return a user's first and last name",
 *     @SWG\Parameter(
 *         name="authorization",
 *         in="header",
 *         type="string",
 *         description="Authorization Token",
 *         required=true,
 *     ),
 *      @SWG\Parameter(
 *         name="uuid",
 *         in="formData",
 *         type="string",
 *         description="uuid",
 *         required=true,
 *     ),
 *      @SWG\Parameter(
 *         name="nama",
 *         in="formData",
 *         type="string",
 *         description="nama",
 *         required=true,
 *     ),
 *      @SWG\Parameter(
 *         name="nim",
 *         in="formData",
 *         type="string",
 *         description="Nim",
 *         required=true,
 *     ),
 *      @SWG\Parameter(
 *         name="email",
 *         in="formData",
 *         type="string",
 *         description="email",
 *         required=true,
 *     ),
 *      @SWG\Parameter(
 *         name="telepon",
 *         in="formData",
 *         type="string",
 *         description="telepon",
 *         required=true,
 *     ),
 *      @SWG\Parameter(
 *         name="handphone",
 *         in="formData",
 *         type="string",
 *         description="handphone",
 *         required=true,
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="OK",
 *     ),
 *     @SWG\Response(
 *         response=422, 
 *         description="Missing Data"
 *     )
 * )
 */

 /**
 * @SWG\Post(
 *     path="/api/ajuan/store",
 *     tags={"Ajuan"},
 *     description="Return a user's first and last name",
 *     @SWG\Parameter(
 *         name="authorization",
 *         in="header",
 *         type="string",
 *         description="Authorization Token",
 *         required=true,
 *     ),
 *      @SWG\Parameter(
 *         name="uuid",
 *         in="formData",
 *         type="string",
 *         description="uuid",
 *         required=true,
 *     ),
 *      @SWG\Parameter(
 *         name="nama",
 *         in="formData",
 *         type="string",
 *         description="nama",
 *         required=true,
 *     ),
 *      @SWG\Parameter(
 *         name="nim",
 *         in="formData",
 *         type="string",
 *         description="Nim",
 *         required=true,
 *     ),
 *      @SWG\Parameter(
 *         name="email",
 *         in="formData",
 *         type="string",
 *         description="email",
 *         required=true,
 *     ),
 *      @SWG\Parameter(
 *         name="telepon",
 *         in="formData",
 *         type="string",
 *         description="telepon",
 *         required=true,
 *     ),
 *      @SWG\Parameter(
 *         name="handphone",
 *         in="formData",
 *         type="string",
 *         description="handphone",
 *         required=true,
 *     ),
 *      @SWG\Parameter(
 *         name="otptext",
 *         in="formData",
 *         type="string",
 *         description="otptext",
 *         required=true,
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="OK",
 *     ),
 *     @SWG\Response(
 *         response=422, 
 *         description="Missing Data"
 *     )
 * )
 */

class Annotation extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
}

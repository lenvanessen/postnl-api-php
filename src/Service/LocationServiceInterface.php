<?php
/**
 * The MIT License (MIT).
 *
 * Copyright (c) 2017-2020 Michael Dekker (https://github.com/firstred)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and
 * associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute,
 * sublicense, and/or sell copies of the Software, and to permit persons to whom the Software
 * is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or
 * substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT
 * NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @author    Michael Dekker <git@michaeldekker.nl>
 * @copyright 2017-2020 Michael Dekker
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace ThirtyBees\PostNL\Service;

use Psr\Cache\InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use ReflectionException;
use Sabre\Xml\LibXMLException;
use ThirtyBees\PostNL\Entity\Request\GetLocation;
use ThirtyBees\PostNL\Entity\Request\GetLocationsInArea;
use ThirtyBees\PostNL\Entity\Request\GetNearestLocations;
use ThirtyBees\PostNL\Entity\Response\GetLocationsInAreaResponse;
use ThirtyBees\PostNL\Entity\Response\GetNearestLocationsResponse;
use ThirtyBees\PostNL\Exception\ApiException;
use ThirtyBees\PostNL\Exception\CifDownException;
use ThirtyBees\PostNL\Exception\CifException;
use ThirtyBees\PostNL\Exception\HttpClientException;
use ThirtyBees\PostNL\Exception\ResponseException;

/**
 * Class LocationService.
 *
 * @method GetNearestLocationsResponse getNearestLocations(GetNearestLocations $getNearestLocations)
 * @method RequestInterface            buildGetNearestLocationsRequest(GetNearestLocations $getNearestLocations)
 * @method GetNearestLocationsResponse processGetNearestLocationsResponse(mixed $response)
 * @method GetLocationsInAreaResponse  getLocationsInArea(GetLocationsInArea $getLocationsInArea)
 * @method RequestInterface            buildGetLocationsInAreaRequest(GetLocationsInArea $getLocationsInArea)
 * @method GetLocationsInAreaResponse  processGetLocationsInAreaResponse(mixed $response)
 * @method GetLocationsInAreaResponse  getLocation(GetLocation $getLocation)
 * @method RequestInterface            buildGetLocationRequest(GetLocation $getLocation)
 * @method GetLocationsInAreaResponse  processGetLocationResponse(mixed $response)
 *
 * @since 1.2.0
 */
interface LocationServiceInterface
{
    /**
     * Get the nearest locations via REST.
     *
     * @param GetNearestLocations $getNearestLocations
     *
     * @return GetNearestLocationsResponse
     *
     * @throws ApiException
     * @throws CifDownException
     * @throws CifException
     * @throws ResponseException
     * @throws InvalidArgumentException
     * @throws ReflectionException
     * @throws HttpClientException
     *
     * @since 1.0.0
     */
    public function getNearestLocationsREST(GetNearestLocations $getNearestLocations);

    /**
     * Get the nearest locations via SOAP.
     *
     * @param GetNearestLocations $getNearestLocations
     *
     * @return GetNearestLocationsResponse
     *
     * @throws ApiException
     * @throws CifDownException
     * @throws CifException
     * @throws LibXMLException
     * @throws ResponseException
     * @throws InvalidArgumentException
     * @throws ReflectionException
     * @throws HttpClientException
     *
     * @since 1.0.0
     */
    public function getNearestLocationsSOAP(GetNearestLocations $getNearestLocations);

    /**
     * Get the nearest locations via REST.
     *
     * @param GetLocationsInArea $getLocations
     *
     * @return GetLocationsInAreaResponse
     *
     * @throws ApiException
     * @throws CifDownException
     * @throws CifException
     * @throws ResponseException
     * @throws InvalidArgumentException
     * @throws ReflectionException
     * @throws HttpClientException
     *
     * @since 1.0.0
     */
    public function getLocationsInAreaREST(GetLocationsInArea $getLocations);

    /**
     * Get the nearest locations via SOAP.
     *
     * @param GetLocationsInArea $getNearestLocations
     *
     * @return GetLocationsInAreaResponse
     *
     * @throws ApiException
     * @throws CifDownException
     * @throws CifException
     * @throws LibXMLException
     * @throws ResponseException
     * @throws InvalidArgumentException
     * @throws ReflectionException
     * @throws HttpClientException
     *
     * @since 1.0.0
     */
    public function getLocationsInAreaSOAP(GetLocationsInArea $getNearestLocations);

    /**
     * Get the location via REST.
     *
     * @param GetLocation $getLocation
     *
     * @return GetLocationsInAreaResponse
     *
     * @throws ApiException
     * @throws CifDownException
     * @throws CifException
     * @throws ResponseException
     * @throws InvalidArgumentException
     * @throws ReflectionException
     * @throws HttpClientException
     *
     * @since 1.0.0
     */
    public function getLocationREST(GetLocation $getLocation);

    /**
     * Get the nearest locations via SOAP.
     *
     * @param GetLocation $getLocation
     *
     * @return GetLocationsInAreaResponse
     *
     * @throws ApiException
     * @throws CifDownException
     * @throws CifException
     * @throws LibXMLException
     * @throws ResponseException
     * @throws InvalidArgumentException
     * @throws ReflectionException
     * @throws HttpClientException
     *
     * @since 1.0.0
     */
    public function getLocationSOAP(GetLocation $getLocation);

    /**
     * Build the GenerateLabel request for the REST API.
     *
     * @param GetNearestLocations $getNearestLocations
     *
     * @return RequestInterface
     *
     * @throws ReflectionException
     *
     * @since 1.0.0
     */
    public function buildGetNearestLocationsRequestREST(GetNearestLocations $getNearestLocations);

    /**
     * Process GetNearestLocations Response REST.
     *
     * @param mixed $response
     *
     * @return GetNearestLocationsResponse|null
     *
     * @throws ResponseException
     * @throws ReflectionException
     * @throws HttpClientException
     *
     * @since 1.0.0
     */
    public function processGetNearestLocationsResponseREST($response);

    /**
     * Build the GenerateLabel request for the SOAP API.
     *
     * @param GetNearestLocations $getLocations
     *
     * @return RequestInterface
     *
     * @throws ReflectionException
     *
     * @since 1.0.0
     */
    public function buildGetNearestLocationsRequestSOAP(GetNearestLocations $getLocations);

    /**
     * Process GetNearestLocations Response SOAP.
     *
     * @param ResponseInterface $response
     *
     * @return GetNearestLocationsResponse
     *
     * @throws CifDownException
     * @throws CifException
     * @throws LibXMLException
     * @throws ResponseException
     * @throws ReflectionException
     * @throws HttpClientException
     *
     * @since 1.0.0
     */
    public function processGetNearestLocationsResponseSOAP(ResponseInterface $response);

    /**
     * Build the GetLocationsInArea request for the REST API.
     *
     * @param GetLocationsInArea $getLocations
     *
     * @return RequestInterface
     *
     * @throws ReflectionException
     *
     * @since 1.0.0
     */
    public function buildGetLocationsInAreaRequestREST(GetLocationsInArea $getLocations);

    /**
     * Proess GetLocationsInArea Response REST.
     *
     * @param mixed $response
     *
     * @return GetLocationsInAreaResponse|null
     *
     * @throws ResponseException
     * @throws ReflectionException
     * @throws HttpClientException
     *
     * @since 1.0.0
     */
    public function processGetLocationsInAreaResponseREST($response);

    /**
     * Build the GetLocationsInArea request for the SOAP API.
     *
     * @param GetLocationsInArea $getLocations
     *
     * @return RequestInterface
     *
     * @throws ReflectionException
     *
     * @since 1.0.0
     */
    public function buildGetLocationsInAreaRequestSOAP(GetLocationsInArea $getLocations);

    /**
     * @param ResponseInterface $response
     *
     * @return GetLocationsInAreaResponse
     *
     * @throws CifDownException
     * @throws CifException
     * @throws LibXMLException
     * @throws ResponseException
     * @throws ReflectionException
     * @throws HttpClientException
     *
     * @since 1.0.0
     */
    public function processGetLocationsInAreaResponseSOAP(ResponseInterface $response);

    /**
     * Build the GetLocation request for the REST API.
     *
     * @param GetLocation $getLocation
     *
     * @return RequestInterface
     *
     * @throws ReflectionException
     *
     * @since 1.0.0
     */
    public function buildGetLocationRequestREST(GetLocation $getLocation);

    /**
     * Process GetLocation Response REST.
     *
     * @param mixed $response
     *
     * @return GetLocationsInAreaResponse|null
     *
     * @throws ResponseException
     * @throws ReflectionException
     * @throws HttpClientException
     *
     * @since 1.0.0
     */
    public function processGetLocationResponseREST($response);

    /**
     * Build the GetLocation request for the SOAP API.
     *
     * @param GetLocation $getLocations
     *
     * @return RequestInterface
     *
     * @throws ReflectionException
     *
     * @since 1.0.0
     */
    public function buildGetLocationRequestSOAP(GetLocation $getLocations);

    /**
     * Process GetLocation Response SOAP.
     *
     * @param ResponseInterface $response
     *
     * @return GetLocationsInAreaResponse
     *
     * @throws CifDownException
     * @throws CifException
     * @throws LibXMLException
     * @throws ResponseException
     * @throws ReflectionException
     * @throws HttpClientException
     *
     * @since 1.0.0
     */
    public function processGetLocationResponseSOAP(ResponseInterface $response);
}

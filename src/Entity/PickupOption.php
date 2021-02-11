<?php
/**
 * The MIT License (MIT).
 *
 * Copyright (c) 2017-2021 Michael Dekker (https://github.com/firstred)
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
 * @copyright 2017-2021 Michael Dekker
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

declare(strict_types=1);

namespace Firstred\PostNL\Entity;

use Firstred\PostNL\Attribute\PropInterface;
use Firstred\PostNL\Attribute\ResponseProp;
use Firstred\PostNL\Misc\SerializableObject;
use Firstred\PostNL\Service\CheckoutServiceInterface;
use Firstred\PostNL\Service\ServiceInterface;
use JetBrains\PhpStorm\ExpectedValues;

/**
 * Class PickupOption.
 */
class PickupOption extends SerializableObject
{
    #[ResponseProp(requiredFor: [CheckoutServiceInterface::class])]
    protected string|null $PickupDate = null;

    #[ResponseProp(requiredFor: [CheckoutServiceInterface::class])]
    protected string|null $ShippingDate = null;

    #[ResponseProp(requiredFor: [CheckoutServiceInterface::class])]
    protected string|null $Option = null;

    #[ResponseProp(requiredFor: [CheckoutServiceInterface::class])]
    protected array|null $Locations = null;

    public function __construct(
        #[ExpectedValues(values: ServiceInterface::SERVICES)]
        string $service = '',
        #[ExpectedValues(values: PropInterface::PROP_TYPES)]
        string $propType = '',

        string|null $PickupDate = null,
        array|null $Locations = null,
    ) {
        parent::__construct(service: $service, propType: $propType);

        $this->setPickupDate(PickupDate: $PickupDate);
        $this->setLocations(Locations: $Locations);
    }

    /**
     * @return string|null
     */
    public function getPickupDate(): string|null
    {
        return $this->PickupDate;
    }

    /**
     * @param string|null $PickupDate
     *
     * @return static
     */
    public function setPickupDate(string|null $PickupDate = null): static
    {
        $this->PickupDate = $PickupDate;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getLocations(): array|null
    {
        return $this->Locations;
    }

    /**
     * @param array|null $Locations
     *
     * @return static
     */
    public function setLocations(array|null $Locations = null): static
    {
        $this->Locations = $Locations;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingDate(): string|null
    {
        return $this->ShippingDate;
    }

    /**
     * @param string|null $ShippingDate
     *
     * @return $this
     */
    public function setShippingDate(string|null $ShippingDate = null): static
    {
        $this->ShippingDate = $ShippingDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOption(): string|null
    {
        return $this->Option;
    }

    /**
     * @param string|null $Option
     *
     * @return $this
     */
    public function setOption(string|null $Option = null): static
    {
        $this->Option = $Option;
        return $this;
    }
}
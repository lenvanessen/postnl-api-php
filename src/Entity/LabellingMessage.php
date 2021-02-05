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
use Firstred\PostNL\Service\ServiceInterface;
use JetBrains\PhpStorm\ExpectedValues;

/**
 * Class LabellingMessage.
 */
class LabellingMessage extends Message
{
    protected string|null $PrinterType = null;

    /**
     * LabellingMessage constructor.
     *
     * @param string      $service
     * @param string      $propType
     * @param string|null $PrinterType
     * @param string|null $MessageID
     * @param string|null $MessageTimeStamp
     *
     * @throws \Firstred\PostNL\Exception\InvalidArgumentException
     */
    public function __construct(
        #[ExpectedValues(values: ServiceInterface::SERVICES + [''])]
        string $service = '',
        #[ExpectedValues(values: PropInterface::PROP_TYPES + [''])]
        string $propType = '',

        string|null $PrinterType = 'GraphicFile|PDF',
        string|null $MessageID = null,
        string|null $MessageTimeStamp = null
    ) {
        parent::__construct(
            service: $service = '',
            propType: $propType = '',
            MessageID: $MessageID,
            MessageTimeStamp: $MessageTimeStamp,
        );

        $this->setPrintertype(PrinterType: $PrinterType);
    }

    /**
     * @return string|null
     */
    public function getPrinterType(): string|null
    {
        return $this->PrinterType;
    }

    /**
     * @param string|null $PrinterType
     */
    public function setPrinterType(string|null $PrinterType = null): void
    {
        $this->PrinterType = $PrinterType;
    }
}
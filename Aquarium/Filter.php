<?php
/**
 * @author: Krzysztof Kromolicki
 */

namespace App\Aquarium;


class Filter
{

    /**
     * @var boolean
     */
    protected $decontamination;
    /**
     * @var boolean
     */
    protected $cleaning;
    /**
     * @var boolean
     */
    protected $fastFiltering;
    /**
     * @var array
     */
    protected $methodCronFilters = [
        '5 4 * * sun' => 'At 04:05 on Sunday.',
        '5 0 * 8 *' => 'At 00:05 in August.',
        '23 0-20/2 * * *' => 'At minute 23 past every 2nd hour from 0 through 20.',
    ];

    /**
     * @param bool $decontamination
     * @return Filters
     */
    public function setDecontamination(bool $decontamination): Filters
    {
        $this->decontamination = $decontamination;

        return $this;
    }

    /**
     * @param bool $cleaning
     * @return Filters
     */
    public function setCleaning(bool $cleaning): Filters
    {
        $this->cleaning = $cleaning;

        return $this;
    }

    /**
     * @param bool $fastFiltering
     * @return Filters
     */
    public function setFastFiltering(bool $fastFiltering): Filters
    {
        $this->fastFiltering = $fastFiltering;

        return $this;
    }

    public function start()
    {

    }


}

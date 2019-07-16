<?php

namespace Barchart\OnDemand\Traits;

trait Endpoints
{
    /**
     * Returns a list of valid endpoints to be called on the object.
     *
     * @return array
     */
    protected function getValidEndpoints()
    {
        return [
            'getAmeriborRate',
            'getBalanceSheets',
            'getBLSIndexes',
            'getCashFlow',
            'getChart',
            'getClosePrice',
            'getCmdtyCalendar',
            'getCmdtyStats',
            'getCmdtyStatsId',
            'getCompetitors',
            'getCorporateActions',
            'getCrypto',
            'getCryptoHistory',
            'getDividendData',
            'getDividendStocks',
            'getEarningsEstimates',
            'getEquitiesByExchange',
            'getEquityOptions',
            'getEquityOptionsHistory',
            'getEquityOptionsIntraday',
            'getETFConstituents',
            'getETFDetails',
            'getFinancialHighlights',
            'getFinancialRatios',
            'getForexForwardCurves',
            'getFuelPrices',
            'getFuturesByExchange',
            'getFuturesExpirations',
            'getFuturesOptions',
            'getFuturesOptionsExpirations',
            'getFuturesSpecifications',
            'getFuturesSpreads',
            'getGrainBids',
            'getGrainInstruments',
            'getHighsLows',
            'getHistory',
            'getIncomeStatements',
            'getIndexMembers',
            'getIndiceComponents',
            'getInstrumentDefinition',
            'getLeaders',
            'getMomentum',
            'getNews',
            'getNewsCategories',
            'getNewsSources',
            'getOptionsScreener',
            'getProfile',
            'getQuote',
            'getQuoteEod',
            'getRatings',
            'getSECFilings',
            'getSectors',
            'getSignal',
            'getSpecialOptions',
            'getSpecialOptionsClassification',
            'getTechnicals',
            'getUSDAGrainPrices',
            'getWeather',
        ];
    }

    /**
     * Use magic method for friendlier requests.
     *
     * @param  string $name
     * @param  array  $arguments
     *
     * @return array|null
     */
    public function __call($name, array $arguments)
    {
        if (in_array($name, $this->getValidEndpoints())) {
            return $this->makeRequest($name, $arguments[0]);
        }
    }
}

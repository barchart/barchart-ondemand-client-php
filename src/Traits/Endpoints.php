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
            'getCRBIndexes',
            'getDividendData',
            'getDividendStocks',
            'getETFConstituents',
            'getETFDetails',
            'getEarningsEstimates',
            'getEquitiesByExchange',
            'getEquityOptions',
            'getEquityOptionsHistory',
            'getEquityOptionsIntraday',
            'getFinancialHighlights',
            'getFinancialRatios',
            'getForexForwardCurves',
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
            'getInsiders',
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
            'getScreener',
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

# Coding challenge

[![PHP Composer](https://github.com/mhsenpc/energised/actions/workflows/php.yml/badge.svg)](https://github.com/mhsenpc/energised/actions/workflows/php.yml)

A CSMS (charging station management system) such as be.ENERGISED is used to manage charging stations, charging
processes and customers (so-called eDrivers) amongst other things.

One of the most important functionalities of such a CSMS is to calculate a price to a particular charging process so that
the eDriver can be invoiced for the consumed services. Establishing a price for a charging process is usually done by
applying a rate to the CDR (charge detail record) of the corresponding charging process.

## How to use it?
### Run App
`php -S 127.0.0.1:8080`

### Send Request to API
`curl --location --request POST 'http://127.0.0.1:8080/rate' \
--header 'Content-Type: text/plain' \
--data-raw '{
"rate": { "energy": 0.3, "time": 2, "transaction": 1 },
"cdr": { "meterStart": 1204307, "timestampStart": "2021-04-05T10:04:00Z", "meterStop": 1215230, "timestampStop":
"2021-04-05T11:27:00Z" }
}'`

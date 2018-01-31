# LSU NSSE survey block
## NSSE survey block utilizing unused profile field
### Version 1
* Creates an NSSE profile field on install
* Utilizes the new field to display a custom link
* Data should be populated by other means
* NSSE field should contain the 10 character NSSE login
  * example data:
    * $USER->profile['nsse'] should return something like "H123456789" without quotes
* Link prefix is configurable
  * Default is "https://nssesurvey.org/" without quotes
  * Trailing slash is required
* Link suffix is configurable
  * Default is "/60" without quotes
  * Leading slash is required

Feature:
  In order to list a category
  As the frontend engineer
  I want to obtain a list with all the available categories.

  @createSchema
  Scenario: Requesting the list of categories
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/json"
    And I send a "GET" request to "/api/categories"
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json; charset=utf-8"
    And the JSON should be equal to:
      """
      [
          {
              "id": 1,
              "internalId": "804040",
              "name": "Sonstige Umzugsleistungen",
              "jobs": []
          },
          {
              "id": 2,
              "internalId": "802030",
              "name": "Abtransport, Entsorgung und Entrümpelung",
              "jobs": []
          },
          {
              "id": 3,
              "internalId": "411070",
              "name": "Fensterreinigung",
              "jobs": []
          },
          {
              "id": 4,
              "internalId": "402020",
              "name": "Holzdielen schleifen",
              "jobs": []
          },
          {
              "id": 5,
              "internalId": "108140",
              "name": "Kellersanierung",
              "jobs": []
          }
      ]
      """
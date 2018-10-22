Feature:
  In order to create a new job
  As a customer
  I want to introduce the details of the job in the form.

  @createSchema
  Scenario: Creating a new job
    When I add "Content-Type" header equal to "application/json"
    And I add "Accept" header equal to "application/json"
    And I send a "POST" request to "/api/jobs" with body:
      """
      {
        "title": "Prune the garden",
        "description": "Prune a big garden with a lot of plants",
        "zip": "10827",
        "city": "Berlin",
        "category": "/api/categories/1",
        "dueDate": "2019-01-10 13:00:00"
      }
      """
    Then the response status code should be 201
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json; charset=utf-8"
    And the JSON should be equal to:
      """
      {
          "id": 1,
          "title": "Prune the garden",
          "zip": "10827",
          "city": "Berlin",
          "description": "Prune a big garden with a lot of plants",
          "dueDate": "2019-01-10T13:00:00+00:00",
          "category": "/api/categories/1"
      }
      """
  @dropSchema
  Scenario: Wrong zip code
    When I add "Content-Type" header equal to "application/json"
    And I add "Accept" header equal to "application/json"
    And I send a "POST" request to "/api/jobs" with body:
      """
      {
        "title": "Prune the garden",
        "description": "Prune a big garden with a lot of plants",
        "zip": "20100",
        "city": "Berlin",
        "category": "/api/categories/1",
        "dueDate": "2019-01-10 13:00:00"
      }
      """
    Then the response status code should be 400
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/problem+json; charset=utf-8"
    And the JSON should be equal to:
      """
      {
          "type": "https://tools.ietf.org/html/rfc2616#section-10",
          "title": "An error occurred",
          "detail": "zip: Invalid zip code",
          "violations": [
              {
                  "propertyPath": "zip",
                  "message": "Invalid zip code"
              }
          ]
      }
      """
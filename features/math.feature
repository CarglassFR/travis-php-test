Feature: Math
    In order to get the sum of two numbers
    As a user
    I need to be able see the result

    Scenario: do an sum
        When I add "2" and "5"
        Then I get "7"

    Scenario: do an substraction
        When I substract "6" and "5"
        Then I get "1"

    Scenario: do an multiplication
        When I multiply "3" and "7"
        Then I get "21"

    Scenario: do an division
        When I divde "40" and "2"
        Then I get "20"

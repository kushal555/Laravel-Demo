Feature: Login
    Background:
        Given a user called "Alan" exists
        And a user called "Bob" exists
        And a user called "Clare" exists
        And a user called "Derek" exists
        And a user called "Eric" exists
    Scenario: Log in as Alan
        Given I am logged in as "Alan"
        And I visit the path "/"
        Then I should see the text "Laravel"
    Scenario: Log in as Bob
        Given I am logged in as "Bob"
        And I visit the path "/"
        Then I should see the text "Laravel"
    Scenario: Log in as Clare
        Given I am logged in as "Clare"
        And I visit the path "/"
        Then I should see the text "Laravel"
    Scenario: Log in as Derek
        Given I am logged in as "Derek"
        And I visit the path "/"
        Then I should see the text "Laravel"
    Scenario: Log in as Eric
        Given I am logged in as "Eric"
        And I visit the path "/"
        Then I should see the text "Laravel"

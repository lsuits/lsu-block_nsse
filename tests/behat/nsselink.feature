@block @block_nsse 
Feature: Block nsse displaying nsse links
  In order to view nsse links
  As a user
  I need to be able to use the block nsse

  Background:
    Given the following "users" exist:
      | username | firstname | lastname |
      | teacher1 | Teacher | User |
      | student1 | Student | User |

  Scenario: Add NSSE Survey Links block in my home
    When I log in as "teacher1"
    And I turn editing mode on
    And I add the "NSSE Survey Links" block
    And I am on my homepage
    Then I should see "Take your NSSE survey" in the "NSSE Survey Links" "block"
    And I log out

  Scenario: Add NSSE Survey Links block in my home
    And I log in as "student1"
    And I turn editing mode on
    And I add the "NSSE Survey Links" block
    And I am on my homepage
    Then I should see "Take your NSSE survey" in the "NSSE Survey Links" "block"
    And I log out

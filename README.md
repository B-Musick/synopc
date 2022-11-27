# Approach
I will be using an Agile approach to developing this application. Thus I will create 
the project in the following way:

1. Create a vision statement
2. Come up with features to create this vision
3. Write up associate user stories and epics for each feature
    - "As a <user>, I want <goal> so that <reason>"
    - An epic is just a large user story with many smaller ones associated

I will develop it in multiple iterations which will have an end date (have multiple
releases). I will assign 
certain features and user stories to complete in that iteration. Once i have 
finished an iteration I will reflect on what I have accomplished, add any new ideas 
I might have, determine things I could improve on.

## Vision statement
- Describe purpose of project
    - Start with one sentence that describes the purpose of the project
- Describe what not how
    - What will project accomplish
    - Why is it valuble and to whom?
    - What are the success criteria?

### Form
- For (target consumer)
- Who 
- The (Product name and category)
- That (Key benefit and reason to buy)
- Unlike (competitor)
- Our product (differentiats from competitor)

## Features
- Accomplished in one iteration
    - Assign priority (customer)
    - Estimate cost (time) - developer does this
        - Sum of all user story times
- Each feature has:
    a. Description of scenario
    b. Goal/description
    c. importance (priority) of feature
    d. Cost (in days)

## User Stories
- Action a user can do to use a feature
- No technical details involved
- Time estimate associated

### Time
- 1 day = 8 hours
## Planning Releases
- Assign set of features based on priority and dependency
- Time boxed (time limited)
- Each iteration ending in release

### Goal
- Want to release early and often to get feedback from users, make things better 
security wise, fix any bugs and prevent from having a large debt.

## After Each iteration
- Measure project velocity
- Determine what went well
- What went bad
- Add any new features or user stories

# Architecture
- Will use <b>n-tier Architecture Pattern<b>

## Presentation layer
- UI

## Logic Layer
- Functionality behind the application

## Data Layer
- Data storage

## Domain Specific Objects
- Data passed between the layers

# Version Control
- Will use a github flow:  
    - create branch off main
    - Push to github
    - Then merge with main once all conflicts fixed

# Testing
- Help prevent introducing bugs
- Show products work
- When want to write a print statement, write it as a test instead
    - Remains artefact and always tested

## 1. Unit testing
- Unit: method or whole class
- Use a fake Database if have requests
- Test logic and data layer (hard to test UI)

### Black Box
- Test just interface
- Dont know how code was implemented

### White box testing
- Test the impelementation

### Test methods
- One method should test one thing
- One method should test one piece of data

### Try-Catch statements
- Use when dont want an error in your code to break script
- Validation is done in logic layer so throw exception to UI
    - Such as login error, etc

### Interface vs. Implementation
- Declares methods that a class can do and specifies a classes behaviour
    - Design by contract (such as defining methods in a header file)

## 2. Integration Testing
- Are units of code working together properly
- Test communication between components 
    - Two things within logic layer
    - Between logic and data layer
    - USe real daabase and logic layer
    - Test seams between layers

## 3. System Testing
- UI --> Logic --> DB --> back to UI
## Implementation
- Defines the method implementations
- Is a concrete class


# My Analysis and directory structure explaination

## Issues in old code

1. There is no proper structure whole code is written in only two classes BookinRepository and BookingController. According to laravel standard there must be only max 7 crud methods in a single controller. If we put two much method it will effect overall performance of application as for any single method php will have to parse whole class to execute it.
2. There is repository pattren used in this example but its not a best because we have already repository layer as Eloquent over database. So we can use either actions or services here instead of repository.
3. There is a security flaw in all update or store requests as there is no validations implemented on server side in provided example.
4. Push notifications are being send also inside Bookrepository and method are defined there. But notifications functionality should be implemented via laravel managers and we can use multiple drivers and change drivers daynamically.
5. I can see alot of functionality is being calculated/manipulated inside php instead of database level.
6. PSR standards are not followed in code.
7. SOLID design principles are not followed.

## Explaination of my coding structure

1. I've created multiple resource and single actions controller following Single Responsibility pattren of SOLID design principle. Where each class should be responsible for only single task.
2. I've used actions to move code from controllers to action so controllers part would be only to interact between database user interface.
3. Each action is responsible for only single actions and if there is other task it will execute other Actions.
4. I've used one service for searching/listing jobs. But unable to refactor 100% as I don't know the datbase schema and completed code.
5. I've created some test models just to add some methods. It's to show that instead of duplicting same code again and again we can puth methods inside models and just call those methods.
6. I'm unable to complete refactor 100% as it may broke down existing code but I've showed the coding structure which I use on my daily basis.

## Unit Tests

1. I've written 1 unit test with four assersions for willExpire at method of TeHelper Class.
2. Only assertion 1 and 4 will pass and assetion 2,3 will fail because code is invalid for both of those conditions.
3. Didn't wrote test for UserRepository as I don't have full code. So I cannot write test without knowing complete logic, schema of db and code base because the purpose of the test is to validate if implemented logic working as expected or now. Also unit test is not applicable on UserRepository as you are saving record to databas so it be either Integration or feature test.

### Conclusion

I've attempted this in about 2 hours and I didn't have enough time to completly review and understand the logic. So I've tried my best to achive according to my understanding in the short time. The coding structure I've used is what I'm using in may daily life projects. I strictly follow PSR coding standards and guidelines and I try my best to follow SOLID design principles also.
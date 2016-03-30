# Docker PHP Resque #

## What is this? ##
This repository contains a proof-of-concept job queue in Docker.
The queue is based on the [PHP implementation of Resqueue](https://github.com/chrisboulton/php-resque).

## How it works ##
The software stack is running in Docker containers, managed by Docker Compose.
The queue is stored on Redis, the client and workers are written in PHP.

### Building ###
To use the stack first you need to install the PHP Composer dependencies.
Running the following command will install Docker Compose,
install PHP Composer dependencies, and build the rest of the containers.
```
make
```

### How to use? ###
To have a good insight into how the stack works we need multiple workers.

Before launching the composite, scale up the number of the `worker` containers to `5`.
```
docker-compose scale worker=5
```

To launch the container composite run the following command:
```
docker-compose up
```

Now you have your stack up and running, let's fire some tasks.
```
docker-compose run --rm fpm php basic_task.php
```
or visit the following url in your browser:
```
http://localhost/fire_task.php
```

This will fire some recursive Fibonacci number calculation tasks to the queue
which will be calculated by the workers.

To see it live, switch back to your first terminal window, and see the results in the log after a while.
You will see similar to this as the workers logging the results.
```
worker_4 | 39088169
worker_2 | 39088169
worker_3 | 39088169
worker_1 | 39088169
worker_5 | 39088169
worker_3 | 39088169
worker_4 | 39088169
worker_2 | 39088169
worker_1 | 39088169
worker_5 | 39088169
```


### Monitoring, debugging ###

Do not increase the number of workers in the `code/settings.php` file, as the PHP will try to fork the process with `pcntl_fork()` which is not allowed due to some limitations. Use the `docker-compose scale workers=n` command instead where `n` is the number of the desired workers.

This stack also includes a Resque web admin that you can reach on the following address:
```
http://localhost:5678/overview
```

## What is missing? ##
In an ideal world you may need Redis replication which is not implemented yet in this example.

## Read more ##
[MESSAGE QUEUES: PHP AND RESQUE](http://programeveryday.com/post/message-queues-php-and-resque/)
[Resque GitHub repo](https://github.com/resque/resque)

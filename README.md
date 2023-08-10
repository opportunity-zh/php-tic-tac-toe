# Tic Tac Toe Game
Build a tic tac toe game with php, get request and session storage.

## Getting Started
Try to work in the exercise without looking at the solution. If you get stuck, then check the files in the main folder.

## Docker local environment
A docker build script is provided, but you can code without docker if you want.
### Content
We have a docker-compose.yml file that will create the following containers:

- A container for Nginx;
- A container for PHP;

### Prerequisites

Make sure [Docker Desktop for Mac or PC](https://www.docker.com/products/docker-desktop) is installed and running, or head [over here](https://docs.docker.com/install/) if you are a Linux user. You will also need a terminal running [Git](https://git-scm.com/).

This setup also uses localhost's port 3000 for Nginx, so make sure it is available.

### Directions of use

Clone the repository and change the current directory for the project's root:

Run the following command:

```
$ docker-compose up -d
```



### Cleaning up

To stop the containers:

```
$ docker-compose stop
```

To destroy the containers:

```
$ docker-compose down
```

To destroy the containers and the associated volumes:

```
$ docker-compose down -v
```

To remove everything, including images and orphan containers:

```
$ docker-compose down -v --rmi all --remove-orphans
```

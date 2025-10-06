[![Quality Score](https://img.shields.io/scrutinizer/g/tohidhabiby/school-template-project.svg?style=flat-square)](https://scrutinizer-ci.com/g/tohidhabiby/school-template-project) [![Build Status](https://img.shields.io/travis/tohidhabiby/school-template-project/master.svg?style=flat-square)](https://travis-ci.org/tohidhabiby/school-template-project)

# Symfony REST API Microservice Template

This is a dockerized Symfony project that provides a solid foundation for building RESTful API microservices.

## Features

*   **Dockerized:** Runs in a containerized environment with PHP, Nginx, and PostgreSQL.
*   **Symfony:** Uses the latest version of the Symfony framework.
*   **Multi-environment:** Configured for `dev`, `stage`, and `prod` environments.
*   **Testing:** Comes with PHPUnit for unit and integration testing.
*   **Code Quality:** Includes PHP-CS-Fixer for code style, PHPStan for static analysis, and Infection for mutation testing.
*   **CI/CD:** Integrated with Scrutinizer for continuous inspection.
*   **Git Hooks:** A pre-commit hook is set up to run tests and code quality checks before each commit.

## Getting Started

1.  **Clone the Repository:**
    ```bash
    git clone https://github.com/tohidhabiby/school-template-project.git
    cd school-template-project
    ```

2.  **Create Local Environment File:**
    Copy the distribution file to create your local environment file. This file is ignored by Git, so your local settings won't be committed.
    ```bash
    cp .env.dist .env
    ```

3.  **Configure Your Environment (Optional):**
    Open the `.env` file and change the `NGINX_PORT` to an available port if you don't want to use the default `8080`.
    ```
    # .env
    NGINX_PORT=8081
    ```

4.  **Build and Start Containers:**
    ```bash
    docker compose up -d --build
    ```

5.  **Access the Application:**
    The application will be available at [http://localhost:8080](http://localhost:8080) (or the port you configured).

## Running Tests and Code Quality Checks

You can run the tools manually inside the Docker container.

*   **Run PHPUnit:**
    ```bash
    docker compose exec php vendor/bin/phpunit
    ```

*   **Run PHP-CS-Fixer:**
    ```bash
    docker compose exec php vendor/bin/php-cs-fixer fix --dry-run --diff
    ```

*   **Run PHPStan:**
    ```bash
    docker compose exec php vendor/bin/phpstan analyse
    ```

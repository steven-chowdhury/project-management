## TTI Challenge - Steven Chowdhury
- Port: 8000
- Endpoints available with `/api` prefix (e.g. `http://localhost:8000/api/projects`)

## Setup Instructions
#### 1. Install Docker
Ensure Docker is installed on your system. For MacOS, you can use Docker Desktop.

#### 2. Clone the repository
Clone the project onto your local machine:
```bash
git clone https://github.com/steven-chowdhury/project-management
cd project-management
```

## Run Instructions
#### 1. Start the Containers
From the project directory, run the following command to start the application and its dependencies: 
```bash
docker-compose up
```

- This will pull all necessary dependencies (such as MySQL) if they don't already exist, and start the container.
- Note: Configuration for MySQL is not needed since it's running as an isolated container.

#### 2. Run the Migrations and Seeders
- Run the migrations and seeders using 
```bash
./vendor/bin/sail artisan migrate --seed
```
- The container is now running on localhost:8000

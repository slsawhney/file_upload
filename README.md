# File Upload

## Challenge Description

- Create a table “sample” with the fields (id, name:string, type:string, location:string) in a local sqlite database
- On the front web page, a user should be able to drop a spreadsheet file – containing a header row (see fields above) 
and some example data (>=5 rows). Check [sample.xlsx](sample.xlsx)
- The file shall be sent (uploaded) to the backend, where its data should be inserted into the database table.
- After upload, all the data from the table should be displayed on the web page

## Project Setup
### 1. Pre-Requisites
- PHP >= 8.2, 
- Composer
- Node.js

#### To if PHP is installed and running:

   ```sh
       php -v
   ```

#### To if Composer is installed and running:

   ```sh
       composer --version
   ```
#### To if Node is installed and running:

   ```sh
       node -v
   ```

### 2. Project Startup
1. Clone the repository:
    ```sh
        git clone https://github.com/slsawhney/file_upload.git
    ```
2. Navigate to the project folder:

    ```sh
        cd file_upload
    ```

3. Install dependencies:

    ```sh
        composer install
    ```

4. Set up the environment configuration:

    ```sh
        cp .env.example .env
    ```

5. Generate an application key:

    ```sh
        php artisan key:generate
    ```

### 3. Frontend Setup
#### Install Frontend Dependencies
1. Install dependencies:

   ```sh
       npm install
   ```

2. Start the frontend build process and enable file watching:

   ```sh
       npm run build
   ```

### 4. Database Setup

- Create the tables via the migrations:
    ```sh
       php artisan migrate
    ```
### 5. Start the server
- Start the Laravel development server:

   ```sh
       php artisan serve
   ```

- Open your browser and go to [http://localhost:8000/](http://localhost:8000/).

### 6. Test Cases
- To run test cases execute:

   ```sh
       php artisan test
   ```

### 7. Uploaded file location
- To run test cases execute:

   ```sh
       ls -la storage/app/public/uploads
   ```

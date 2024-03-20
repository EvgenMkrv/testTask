<?php
class Account
{
    public string $message;

    private object $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=localhost;dbname=user_accounts', 'root', '');
        } catch (Exception $exception) {
            echo ($exception->getMessage());
        }
    }

    /**
     * @param false|PDOStatement $stmt
     * @param array $fieldsToUpdate
     * @return void
     */
    public function extracted(false|PDOStatement $stmt, array $fieldsToUpdate): void
    {
        $stmt->bindParam('first_name', $fieldsToUpdate['first_name']);
        $stmt->bindParam('last_name', $fieldsToUpdate['last_name']);
        $stmt->bindParam('email', $fieldsToUpdate['email']);
        $stmt->bindParam('company_name', $fieldsToUpdate['company_name']);
        $stmt->bindParam('position', $fieldsToUpdate['position']);
        $stmt->bindParam('phone_number_1', $fieldsToUpdate['phone_number_1']);
        $stmt->bindParam('phone_number_2', $fieldsToUpdate['phone_number_2']);
        $stmt->bindParam('phone_number_3', $fieldsToUpdate['phone_number_3']);
    }

    public function accountsCount(): int
    {
        $stmt = $this->connection->prepare("SELECT count(*) FROM accounts");

        try {
            $stmt->execute();
        } catch (Exception $exception) {
            print_r($exception->getMessage());
        }
        $result = $stmt->fetch();
        return $result[0];
    }

    public function index($page): array
    {
        $offset = ($page == 1) ? 0 : $page * 10 - 10;

        $stmt = $this->connection->prepare("SELECT * FROM accounts LIMIT 10 OFFSET " . $offset);

        try {
            $stmt->execute();
        } catch (Exception $exception) {
            print_r($exception->getMessage());
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store(array $fieldsToStore): void
    {
        $stmt = $this->connection->prepare(
            "INSERT INTO accounts 
                (first_name, last_name, email, company_name, position, phone_number_1, phone_number_2, phone_number_3)
            VALUES 
                (:first_name, :last_name, :email, :company_name, :position, :phone_number_1, :phone_number_2, :phone_number_3)");
        $this->extracted($stmt, $fieldsToStore);

        try {
            $stmt->execute();
        } catch (Exception $exception) {
            if (stripos($exception, '23000')) {
                $this->message = 'Аккаунт с указанной почтой уже существует!';
            }
        }
    }

    public function update(array $fieldsToUpdate, int $id): void
    {
        $stmt = $this->connection->prepare(
            "UPDATE accounts SET
                first_name = :first_name,
                last_name = :last_name,
                email = :email,
                company_name = :company_name,
                position = :position,
                phone_number_1 = :phone_number_1, 
                phone_number_2 = :phone_number_2, 
                phone_number_3 = :phone_number_3
            WHERE id = :id");
        $this->extracted($stmt, $fieldsToUpdate);
        $stmt->bindParam('id', $fieldsToUpdate['update']);

        try {
            $stmt->execute();
        } catch (Exception $exception) {
            print_r($exception->getMessage());
        }


    }

    public function delete(int $id): void
    {
        $stmt = $this->connection->prepare("DELETE FROM accounts WHERE id = :id");
        $stmt->bindParam('id', $id);

        try {
            $stmt->execute();
        } catch (Exception $exception) {
            print_r($exception->getMessage());
        }
    }

    public function findAccount(int $id): array
    {
        $stmt = $this->connection->prepare("SELECT * FROM accounts WHERE id = :id");
        $stmt->bindParam('id', $id);

        try {
            $stmt->execute();
        } catch (Exception $exception) {
            print_r($exception->getMessage());
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

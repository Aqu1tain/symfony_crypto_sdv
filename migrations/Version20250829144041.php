<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250829144041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE crypto (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, value DOUBLE PRECISION NOT NULL, INDEX IDX_68282885A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE crypto_transaction (crypto_id INT NOT NULL, transaction_id INT NOT NULL, INDEX IDX_5380A1D5E9571A63 (crypto_id), INDEX IDX_5380A1D52FC0CB0F (transaction_id), PRIMARY KEY(crypto_id, transaction_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, user_sender_id INT DEFAULT NULL, user_receiver_id INT DEFAULT NULL, qte INT NOT NULL, date VARCHAR(255) NOT NULL, INDEX IDX_723705D1F6C43E79 (user_sender_id), INDEX IDX_723705D164482423 (user_receiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE crypto ADD CONSTRAINT FK_68282885A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE crypto_transaction ADD CONSTRAINT FK_5380A1D5E9571A63 FOREIGN KEY (crypto_id) REFERENCES crypto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE crypto_transaction ADD CONSTRAINT FK_5380A1D52FC0CB0F FOREIGN KEY (transaction_id) REFERENCES transaction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1F6C43E79 FOREIGN KEY (user_sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D164482423 FOREIGN KEY (user_receiver_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE crypto DROP FOREIGN KEY FK_68282885A76ED395');
        $this->addSql('ALTER TABLE crypto_transaction DROP FOREIGN KEY FK_5380A1D5E9571A63');
        $this->addSql('ALTER TABLE crypto_transaction DROP FOREIGN KEY FK_5380A1D52FC0CB0F');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1F6C43E79');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D164482423');
        $this->addSql('DROP TABLE crypto');
        $this->addSql('DROP TABLE crypto_transaction');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE user');
    }
}

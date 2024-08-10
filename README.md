# Doctrine ORM Project

This project uses Doctrine ORM for database management in PHP. Below are some quick notes and commands to help you get started.

## Notes

- When creating entity classes, all of the fields should be private.
- Use protected when strictly needed and very rarely, if ever, public.
- The `id` field has no setter since it represents a database id value and your code generally shouldn't set this value.

## Commands

### Schema Management

- Drop the schema:
  ```sh
  php bin/doctrine orm:schema-tool:drop --force
  ```

- Create the schema:
  ```sh
  php bin/doctrine orm:schema-tool:create
  ```

- Update the schema:
  ```sh
  php bin/doctrine orm:schema-tool:update --force
  ```

- Update the schema and print the DDL statements:
  ```sh
  php bin/doctrine orm:schema-tool:update --force --dump-sql
  ```
  Specifying both flags `--force` and `--dump-sql` will cause the DDL statements to be executed and then printed to the screen.

### Cache Management

- Clear the cache:
  ```sh
  sudo -u www-data php app/console cache:clear --env=dev
  ```

- Clear all Query cache entries:
  ```sh
  php bin/doctrine orm:clear-cache:query
  ```

For more detailed instructions, check out the [Doctrine ORM Getting Started Guide](https://www.doctrine-project.org/projects/doctrine-orm/en/current/tutorials/getting-started.html).

CREATE VIEW view_users AS (

    SELECT u.*,
        (SELECT value FROM users_about WHERE user = u.id AND item = 1) AS country,
        (SELECT value FROM users_about WHERE user = u.id AND item = 2) AS first_name,
        (SELECT value FROM users_about WHERE user = u.id AND item = 3) AS state
      FROM users AS u

);

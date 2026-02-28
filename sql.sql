select * from users ;

ALTER TABLE _colocation
DROP COLUMN owner_id;
DROP TABLE invitations;

delete from sessions ;
# Project 4
+ By: *Joshua Persson*
+ Production URL: <http://p4.shua-page.com>

## Database

Primary tables:
  + `projects`
  + `uploads`
  
Pivot table:
  + `project_upload`


## CRUD

__Create__
  + Visit <http://p4.shua-page.com/data>
  + Fill out form.
  + Click *Enter Data*.
  + Observe confirmation message.
  
__Read__
  + Visit <http://p4.shua-page.com/search> 
  + Search by partial project name, project type, City or State.
  
__Update__
  + Visit <http://p4.shua-page.com/search>
  + Search for a Project.
  + Click edit to the right of the project listing in table row for project.
  + Complete form.
  + Click Update Project.
  + Observe confirmation.
  
__Delete__
  + Visit <http://p4.shua-page.com/search>
  + Search for a Project
  + Click the delete link to the right of the project listing in table row for project.
  + Choose to delete or go back to Search.
  + If deleted, observe confirmation.

## Outside resources
 + Attaching multi-select data:  
        <https://laracasts.com/discuss/channels/eloquent/sync-attach-multiselect-form-input>
        <https://stackoverflow.com/questions/35611945/old-value-in-multiple-select-option-in-laravel-blade>

## Code style divergences
  + None.

## Notes
  + Projects can have one or more camera calibration. Camera calibrations can belong to more than one project.


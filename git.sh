# git init
git add . 
git commit -m "first commit"
#git remote add origin   https://github.com/leonrom/cb.git

git add -u :/ # adds all modified file changes to the stage 
git add * :/  # adds modified and any new files (that's not gitignore'ed) to the stage

git pull
git push -u origin master

git log --pretty=oneline
git tag -a v1.0.1 -m 'version 1.0.2' b2e6bb49
git push origin v1.0.1

git rm --cached *.txt
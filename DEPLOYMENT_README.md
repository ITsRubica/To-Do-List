# 🚀 DailyDo - Free Deployment Guide

Your PHP To-Do List application is ready for deployment! This guide will help you deploy it to free hosting services.

## 📋 Pre-Deployment Checklist

✅ **Files Ready:**
- `.htaccess` - Server configuration
- `database.sql` - Database schema
- `deploy.php` - Deployment checker
- Updated `config/database.php` - Production-ready config

## 🏆 Recommended Free Hosting: InfinityFree

**Why InfinityFree?**
- ✅ No ads on your website
- ✅ Unlimited storage & bandwidth
- ✅ MySQL databases included
- ✅ PHP 8.1 support
- ✅ cPanel access
- ✅ 99.9% uptime
- ✅ SSL certificates

### 🚀 Quick Deployment to InfinityFree

#### Step 1: Sign Up
1. Go to https://infinityfree.net/
2. Click "Create Account"
3. Fill in your details and verify email

#### Step 2: Create Hosting Account
1. Login to InfinityFree
2. Click "Create Account" 
3. Choose subdomain or use your own domain
4. Wait for account activation (usually instant)

#### Step 3: Upload Files
1. Access cPanel from your hosting dashboard
2. Open "File Manager"
3. Navigate to `htdocs` folder
4. Upload all your project files (you can zip them first)
5. Extract if you uploaded a zip file

#### Step 4: Setup Database
1. In cPanel, find "MySQL Databases"
2. Create a new database (note the full database name)
3. Create a database user and password
4. Assign user to database with all privileges
5. Go to "phpMyAdmin"
6. Select your database
7. Click "Import" and upload your `database.sql` file

#### Step 5: Configure Database Connection
1. In File Manager, edit `config/database.php`
2. Update the production database settings:
   ```php
   // Update these lines in the production section:
   define('DB_HOST', 'sql200.infinityfree.com'); // Your DB host
   define('DB_NAME', 'if0_12345678_dailydo');    // Your full DB name
   define('DB_USER', 'if0_12345678');            // Your DB username  
   define('DB_PASS', 'your_password');           // Your DB password
   ```

#### Step 6: Test Deployment
1. Visit your website URL
2. Run `yoursite.com/deploy.php` to check everything
3. If all green, delete `deploy.php` for security
4. Test registration, login, and task management

## 🔄 Alternative Free Hosting Options

### 000webhost
- **URL**: https://www.000webhost.com/
- **Storage**: 1GB
- **Bandwidth**: 10GB/month
- **Databases**: 2 MySQL databases

### AwardSpace  
- **URL**: https://www.awardspace.com/
- **Storage**: 1GB
- **Bandwidth**: 5GB/month
- **Databases**: 1 MySQL database

### FreeHosting.com
- **URL**: https://www.freehosting.com/
- **Storage**: 10GB
- **Bandwidth**: Unlimited
- **Databases**: MySQL included

## 🛠️ Deployment Steps (General)

### 1. Prepare Your Files
```bash
# Create deployment package (exclude these):
- .vscode/
- *.md files (optional)
- Local config files
```

### 2. Database Setup
- Export local database: Use phpMyAdmin or command line
- Import to hosting: Use hosting's phpMyAdmin
- Update credentials: Edit `config/database.php`

### 3. File Upload Methods
- **File Manager**: Direct upload through hosting control panel
- **FTP**: Use FileZilla or similar FTP client
- **Git**: Some hosts support Git deployment

### 4. Post-Deployment
- Run `deploy.php` to verify setup
- Test all functionality
- Delete `deploy.php` after testing
- Set up SSL certificate (usually free)

## 🔧 Troubleshooting

### Database Connection Issues
```php
// Check these in config/database.php:
- Correct hostname (usually localhost or provided by host)
- Exact database name (often prefixed by hosting)
- Correct username and password
- Database exists and user has permissions
```

### File Permission Issues
```bash
# Set correct permissions:
Folders: 755
Files: 644
```

### .htaccess Issues
- Ensure .htaccess is uploaded
- Check if mod_rewrite is enabled
- Verify hosting supports .htaccess

### Session Issues
- Check if hosting supports PHP sessions
- Verify session.save_path is writable

## 📞 Support

If you encounter issues:
1. Check hosting documentation
2. Use hosting support (most free hosts have forums)
3. Verify all deployment steps were followed
4. Run `deploy.php` to identify specific issues

## 🔒 Security Notes

- Delete `deploy.php` after successful deployment
- Use strong database passwords
- Enable SSL/HTTPS when available
- Keep PHP and hosting platform updated

---

**🎉 Your DailyDo app is ready for the world!**

Visit your deployed site and start managing tasks online!
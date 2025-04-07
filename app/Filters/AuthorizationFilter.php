<?php

namespace App\Filters;

use App\Services\AuthorizationService;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthorizationFilter implements FilterInterface
{
    protected $auths;

    public function __construct()
     {
        $this->auths = new AuthorizationService();
     }

    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */

    

    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the user is logged in
        $session = session();
        $userId = $session->get('user_id');  // Assuming you store user ID in the session
        
        if (!$session->get('logged_in') || empty($userId)) {
            log_message('error', 'User not logged in. Redirecting to login page.');
            return redirect()->to('login');
        }

        // Check for roles or permissions if specified in arguments
        foreach ($arguments as $arg) {
            if (strpos($arg, 'role:') === 0) {
                // If the argument starts with 'role:', check for the role
                $roleName = substr($arg, 5); // Remove 'role:' prefix
                if (!$this->auths->userHasRole($userId, $roleName)) {
                    return redirect()->to('/no-access');
                }
            } elseif (strpos($arg, 'permission:') === 0) {
                // If the argument starts with 'permission:', check for the permission
                $permissionName = substr($arg, 11); // Remove 'permission:' prefix
                if (!$this->auths->userHasPermission($userId, $permissionName)) {
                    return redirect()->to('/no-permission');
                }
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}

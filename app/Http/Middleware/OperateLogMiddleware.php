<?php

namespace App\Http\Middleware;

use App\Models\OperateLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 操作日志中间件
 */
class OperateLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->isMethod('get')) {//Get请求不加入日志
            OperateLog::create([
                'ip' => $request->getClientIp(),
                'method' => $request->method(),
                'url' => $request->getUri(),
                'params' => json_encode($request->all()),
                'uid' => empty(Auth::id()) ? 0 : Auth::id(),
            ]);
        }
        return $next($request);
    }
}

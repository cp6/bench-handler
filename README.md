<h1>Bench handler</h1>
<p>A PHP function that handles a server benchmark output into either an array or inserts into a MYSQL database. Currently supported benchmarks are <a href="https://bench.sh/">bench.sh</a> and <a href="https://github.com/n-st/nench">nench</a>. Support markdown syntax and hot keys.</p>

[![Generic badge](https://img.shields.io/badge/version-0.2-blue.svg)](https://shields.io/)


<p>Usage:</p>

```php
require('functions.php');
```
<p>
then
</p>

```php
echo benchsh('server_name', 'thebench.log', 1);//for MYSQL INSERT
echo json_encode(benchsh('server_name', 'thebench.log', 2));//for JSON output
```
<p>
or
</p>

```php
echo nench('server_name', 'thenench.log', 1);//for MYSQL INSERT
echo json_encode(nench('server_name', 'thenench.log', 2));//for JSON output
```

<h1>To be added:</h1>
<ul>
  <li>IPv6 Speedtests (bench.sh)</li>
  <li>Byte and Bit handling</li>
  <li>String and Int variables</li>
  <li>Add url $_GET ability</li>
</ul>

<p>

__For correct log file formating have your output files like the examples below, noting what is on the first line:__

</p>


<h2>Example bench.sh</h2>
<pre><code>CPU model            : Intel(R) Xeon(R) CPU E3-1270 v6 @ 3.80GHz
Number of cores      : 1
CPU frequency        : 3792.034 MHz
Total size of Disk   : 9.9 GB (1.0 GB Used)
Total amount of Mem  : 485 MB (56 MB Used)
Total amount of Swap : 0 MB (0 MB Used)
System uptime        : 0 days, 0 hour 3 min
Load average         : 0.03, 0.08, 0.04
OS                   : Ubuntu 17.04
Arch                 : x86_64 (64 Bit)
Kernel               : 4.10.0-28-generic
----------------------------------------------------------------------
I/O speed(1st run)   : 260 MB/s
I/O speed(2nd run)   : 566 MB/s
I/O speed(3rd run)   : 708 MB/s
Average I/O speed    : 511.3 MB/s
----------------------------------------------------------------------
Node Name                       IPv4 address            Download Speed
CacheFly                        205.234.175.175         102MB/s
Linode, Tokyo, JP               106.187.96.148          4.80MB/s
Linode, Singapore, SG           139.162.23.4            7.07MB/s
Linode, London, UK              176.58.107.39           99.2MB/s
Linode, Frankfurt, DE           139.162.130.8           54.0MB/s
Linode, Fremont, CA             50.116.14.9             5.48MB/s
Softlayer, Dallas, TX           173.192.68.18           7.32MB/s
Softlayer, Seattle, WA          67.228.112.250          7.80MB/s
Softlayer, Frankfurt, DE        159.122.69.4            30.7MB/s
Softlayer, Singapore, SG        119.81.28.170           6.79MB/s
Softlayer, HongKong, CN         119.81.130.170          6.27MB/s
----------------------------------------------------------------------
Node Name                       IPv6 address            Download Speed
Linode, Atlanta, GA             2600:3c02::4b           8.75MB/s
Linode, Dallas, TX              2600:3c00::4b           4.35MB/s
Linode, Newark, NJ              2600:3c03::4b           11.8MB/s
Linode, Singapore, SG           2400:8901::4b           4.73MB/s
Linode, Tokyo, JP               2400:8900::4b           6.60MB/s
Softlayer, San Jose, CA         2607:f0d0:2601:2a::4    8.81MB/s
Softlayer, Washington, WA       2607:f0d0:3001:78::2    15.3MB/s
Softlayer, Paris, FR            2a03:8180:1301:8::4     56.2MB/s
Softlayer, Singapore, SG        2401:c900:1101:8::2     7.67MB/s
Softlayer, Tokyo, JP            2401:c900:1001:16::4    3.89MB/s</code></pre>

<h2>Example nench</h2>
<pre><code>nench.sh v2018.04.14 -- https://git.io/nench.sh
benchmark timestamp:    2018-06-21 07:00:11 UTC
-------------------------------------------------
Processor:    Intel Core Processor (Broadwell, IBRS)
CPU cores:    1
Frequency:    3504.000 MHz
RAM:          961M
Swap:         -
Kernel:       Linux 4.15.0-20-generic x86_64
Disks:
sda     30G  HDD
CPU: SHA256-hashing 500 MB
2.432 seconds
CPU: bzip2-compressing 500 MB
3.968 seconds
CPU: AES-encrypting 500 MB
0.808 seconds
ioping: seek rate
min/avg/max/mdev = 109.8 us / 305.2 us / 30.1 ms / 279.3 us
ioping: sequential read speed
generated 4.26 k requests in 5.00 s, 1.04 GiB, 852 iops, 213.0 MiB/s
dd: sequential write speed
1st run:    412.94 MiB/s
2nd run:    417.71 MiB/s
3rd run:    412.94 MiB/s
average:    414.53 MiB/s
IPv4 speedtests
your IPv4:    139.99.198.xxxx
Cachefly CDN:         11.64 MiB/s
Leaseweb (NL):        3.76 MiB/s
Softlayer DAL (US):   2.53 MiB/s
Online.net (FR):      1.88 MiB/s
OVH BHS (CA):         0.36 MiB/s
No IPv6 connectivity detected</code></pre>

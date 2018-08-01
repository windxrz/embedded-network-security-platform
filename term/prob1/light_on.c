#include "mraa.h"
#include <stdio.h>
#include <unistd.h>

int main()
{
        int j;
		printf("<center><font size=\"7\" color=\"red\"><strong>破解成功！！！</strong></font></center>");
		mraa_init();
        mraa_gpio_context pin78 = mraa_gpio_init(52);
        mraa_gpio_dir(pin78, MRAA_GPIO_OUT_HIGH);
        mraa_gpio_context pin79 = mraa_gpio_init(53);
        mraa_gpio_dir(pin79, MRAA_GPIO_OUT_HIGH);
        mraa_gpio_context pin80 = mraa_gpio_init(54);
        mraa_gpio_dir(pin80, MRAA_GPIO_OUT_LOW);
        mraa_gpio_context pin81 = mraa_gpio_init(55);
        mraa_gpio_dir(pin81, MRAA_GPIO_OUT_HIGH);
		for (j=0;j<2000;j++)
        {
            mraa_gpio_write(pin78,0);
            usleep(50);
            mraa_gpio_write(pin78,1);
            usleep(50);
        }
        return MRAA_SUCCESS;
}